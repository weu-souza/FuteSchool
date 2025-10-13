<section id="card" class="card-jogador-controle" data-jogador="<?php echo $jogador['codigo_jogador']; ?>">
    <div class="card-top">
        <div class="imagem-container">
            <div class="image-div"><img src="<?php echo $jogador['foto_user'] ?>" alt="imagem jogador"></div>
            <p class="paragrafo"><?php echo $jogador['nome_jogador'] ?></p>
        </div>
        <div class="card-select">
            <select class="input-formulario paragrafo" onchange="alterarJogador(<?php echo $jogador['codigo_jogador']; ?>, this)">
                <option value="-1">escolha um jogador</option>
                <?php
                $url = 'http://localhost:8081/model/jogo/jogadores/getJogadores.php?code_time=' . urlencode($jogador['codigo_time']) . '&posicao_time=' . urlencode($jogador['posicao_jogador']);

                $response = @file_get_contents($url);

                $data = [];
                if ($response !== false) {
                    $data = json_decode($response, true);
                }
                if (empty($data)) {
                    echo "<option value='-1'>Nenhum jogador reserva para essa posição</option>";
                } else {

                    foreach ($data as $jogadorInfo) {
                        echo "<option value='{$jogadorInfo['codigo_jogador']}'>{$jogadorInfo['nome_jogador']}</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <div class="cartão-container">
        <div class="cartao-amarelo amarelo">
            <div class="cartao-button-container titulo">
                <button onclick="removerCartaoAmarelo(<?php echo $jogador['codigo_jogador']; ?>)"><i class="fa-solid fa-circle-minus"></i></button>
                <p class="cartao-amarelo" data-jogador="<?php echo $jogador['codigo_jogador']; ?>">0</p>
                <button onclick="marcarCartaoAmarelo(<?php echo $jogador['codigo_jogador']; ?>)"><i class="fa-solid fa-circle-plus"></i></button>
            </div>
        </div>
        <div class="cartao-vermelho inativo">
            <div class="cartao-button-container titulo">
                <button onclick="removerCartaoVermelho(<?php echo $jogador['codigo_jogador']; ?>)"><i class="fa-solid fa-circle-minus"></i></button>
                <p class="cartao-vermelho" data-jogador="<?php echo $jogador['codigo_jogador']; ?>">0</p>
                <button onclick="marcarCartaoVermelho(<?php echo $jogador['codigo_jogador']; ?>)"><i class="fa-solid fa-circle-plus"></i></button>
            </div>
        </div>
    </div>
    <div class="button-card-jogador-container">
        <button class="button-full" onclick="marcarGol(<?php echo $jogador['codigo_jogador']; ?>)">marcar gol</button>
        <button class="button-full" onclick="marcarDefesa(<?php echo $jogador['codigo_jogador']; ?>)">marcar defesa</button>
    </div>
</section>
<script>
    function alterarJogador(codigo_jogador, event) {
        const e = event.value;
        if (e === "-1") {
            return;
        }
        fetch(`http://localhost:8081/model/jogo/jogadores/alterarJogador.php`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                titular_id: codigo_jogador,
                reserva_id: e,
            })
        }).catch(error => console.error('Error:', error));
    }
</script>
<script>
    function marcarGol(idJogador) {
        let timer = localStorage.getItem('tempoRestante');
        addEstatistica(null, "G", idJogador);
    }

    function marcarDefesa(idJogador) {
        let timer = localStorage.getItem('tempoRestante');
        addEstatistica(null, "D", idJogador);
    }

    function marcarCartaoAmarelo(idJogador) {
        let timer = localStorage.getItem('tempoRestante');
        addEstatistica("A", null, idJogador);
    }

    function marcarCartaoVermelho(idJogador) {
        let timer = localStorage.getItem('tempoRestante');
        addEstatistica("V", null, idJogador);
    }

    function removerCartaoAmarelo(idJogador) {
        let timer = localStorage.getItem('tempoRestante');
        deleteCartao("A", idJogador);
    }

    function removerCartaoVermelho(idJogador) {
        let timer = localStorage.getItem('tempoRestante');
        deleteCartao("V", idJogador);
    }


    function fetchCartoes(idJogador) {
        fetch(`http://localhost:8081/model/jogo/cartoes/getCartaoJogador.php?codigo_jogador=${idJogador}&codigo_partida=<?php echo $idPartida ?>`)
            .then(res => res.json())
            .then(data => {
                // Atualiza apenas os elementos do card específico
                $(`.cartao-amarelo[data-jogador="${idJogador}"]`).text(data.qtd_cartao_amarelo ?? '0');
                $(`.cartao-vermelho[data-jogador="${idJogador}"]`).text(data.qtd_cartao_vermelho ?? '0');
            })
            .catch(err => console.error(err));
    }

    // Loop por todos os cards
    $('.card-jogador-controle').each(function() {
        const id = $(this).data('jogador');
        fetchCartoes(id);
        setInterval(() => fetchCartoes(id), 1000);
    });

    function addEstatistica(tipoInfracao, tipoMarcacao, idJogador) {
        fetch('http://localhost:8081/model/jogo/cartoes/addEstatistica.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    codigo_partida: <?php echo $idPartida ?>,
                    codigo_jogador: idJogador,
                    minuto_ocorrencia: localStorage.getItem('tempoRestante'),
                    tempo_ocorrencia: '<?php echo $partida['tempo_atual'] ?>',
                    tipo_marcacao: tipoMarcacao,
                    tipo_infracao: tipoInfracao
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    function deleteCartao(tipoInfracao, idJogador) {
        fetch('http://localhost:8081/model/jogo/cartoes/removerCartao.php', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    codigo_jogador: idJogador,
                    tipo_infracao: tipoInfracao
                })
            })
            .then(async response => {
                const data = await response.json();
                if (!response.ok) throw new Error(data.error || 'Erro desconhecido');
                console.log('Success:', data);
            })
            .catch(error => {
                console.error('Error:', error.message);
            });
    }
</script>