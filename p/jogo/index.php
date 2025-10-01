<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>jogo</title>
    <?php include '../../global/php/head.php'; ?>
    <link rel="stylesheet" href="css/controle-jogo.css">
</head>

<body>
    <?php include '../../global/php/header/header.php'; ?>
    <main>
        <?php
        require_once '../../model/jogo/getJogo.php';
        $idPartida = $_GET['id'];
        $partida = getPartidaById($idPartida);
        $tempo = getTempoPartidaByPartidaId($idPartida);

        $casa = getTimeByPartidaId($tempo['codigo_time_casa'], $idPartida);
        $visita = getTimeByPartidaId($tempo['codigo_time_visitante'], $idPartida);


        echo '<section class="timer-container">
            <div class="top-container">
                <p class="subititulo cinza-escuro-text">' . $partida['data_partida'] . '</p>';
        if ($partida['tempo_atual'] == 'P') {
            echo '<p class="subititulo cinza-escuro-text">Primeiro tempo</p>';
        } else if ($partida['tempo_atual'] == 'S') {
            echo '<p class="subititulo cinza-escuro-text">Segundo tempo</p>';
        }
        echo '</div>
            </div>
            <div class="bottom-container">
                <div class="time-container">
                    <img src="' . $partida['foto_time_casa'] . '" alt="">
                    <p class="subititulo cinza-escuro-text">' . $partida['nome_time_casa'] . '</p>
                    <p id="gols-casa" class="subititulo cinza-escuro-text"></p>
                </div>
                <p id="timer" class="subititulo cinza-escuro-text"></p>
                <div class="time-container">
                    <img src="' . $partida['foto_time_visitante'] . '" alt="">
                    <p class="subititulo cinza-escuro-text">' . $partida['nome_time_visitante'] . '</p>
                    <p id="gols-visita" class="subititulo cinza-escuro-text"></p>
                </div>
            </div>
        </section>';

        ?>
        <section class="gramado-container">
            <!-- time casa -->
            <div class="time-primeiro">
                <div class="goleiro">
                    <?php
                    if (isset($casa) && is_array($casa)) {
                        foreach ($casa as $jogador) {
                            if (
                                isset($jogador['tipo_participacao'], $jogador['posicao_jogador'])
                                && $jogador['tipo_participacao'] == "T"
                                && $jogador['posicao_jogador'] == 'goleiro'
                            ) {

                                $id = $jogador['codigo_jogador'];

                                echo '<div class="card-hide-' . $jogador['codigo_jogador'] . '">';
                                include './card-jogador/card-jogador.php';
                                echo '</div>';

                                echo '<div class="jogador-container">
                     <div class="jogador-image-container">
                         <button onClick="abrirCard(' . $jogador['codigo_jogador'] . ')" class="camisa-jogador subititulo cinza-claro-text">'
                                    . $jogador['numero_camisa'] . '</button>
                         <img src="' . $jogador['foto_user'] . '" alt="">
                     </div>
                     <p class="navegacao cinza-claro-text">' . $jogador['nome_jogador'] . '</p>
                  </div>';
                            }
                        }
                    }
                    ?>
                </div>
                <div class="zagueiro">
                    <?php
                    if (isset($casa) && is_array($casa)) {
                        foreach ($casa as $jogador) {
                            if (
                                isset($jogador['tipo_participacao'], $jogador['posicao_jogador'])
                                && $jogador['tipo_participacao'] == "T"
                                && $jogador['posicao_jogador'] == 'meio-campo'
                            ) {

                                $id = $jogador['codigo_jogador'];

                                echo '<div class="card-hide-' . $jogador['codigo_jogador'] . '">';
                                include './card-jogador/card-jogador.php';
                                echo '</div>';

                                echo '<div class="jogador-container">
                     <div class="jogador-image-container">
                         <button onClick="abrirCard(' . $jogador['codigo_jogador'] . ')" class="camisa-jogador subititulo cinza-claro-text">'
                                    . $jogador['numero_camisa'] . '</button>
                         <img src="' . $jogador['foto_user'] . '" alt="">
                     </div>
                     <p class="navegacao cinza-claro-text">' . $jogador['nome_jogador'] . '</p>
                  </div>';
                            }
                        }
                    }
                    ?>

                </div>
                <div class="meio-campo">
                    <?php
                    if (isset($casa) && is_array($casa)) {
                        foreach ($casa as $jogador) {
                            if (
                                isset($jogador['tipo_participacao'], $jogador['posicao_jogador'])
                                && $jogador['tipo_participacao'] == "T"
                                && $jogador['posicao_jogador'] == 'atacante'
                            ) {

                                $id = $jogador['codigo_jogador'];

                                echo '<div class="card-hide-' . $jogador['codigo_jogador'] . '">';
                                include './card-jogador/card-jogador.php';
                                echo '</div>';

                                echo '<div class="jogador-container">
                     <div class="jogador-image-container">
                         <button onClick="abrirCard(' . $jogador['codigo_jogador'] . ')" class="camisa-jogador subititulo cinza-claro-text">'
                                    . $jogador['numero_camisa'] . '</button>
                         <img src="' . $jogador['foto_user'] . '" alt="">
                     </div>
                     <p class="navegacao cinza-claro-text">' . $jogador['nome_jogador'] . '</p>
                  </div>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- time 2 -->
            <div class="time-segundo">
                <div class="meio-campo">
                    <?php
                    if (isset($visita) && is_array($visita)) {
                        foreach ($visita as $jogador) {
                            if (
                                isset($jogador['tipo_participacao'], $jogador['posicao_jogador'])
                                && $jogador['tipo_participacao'] == "T"
                                && $jogador['posicao_jogador'] == 'atacante'
                            ) {

                                echo '<div class="card-hide-' . $jogador['codigo_jogador'] . '">';
                                include './card-jogador/card-jogador.php';
                                echo '</div>';

                                echo '<div class="jogador-container">
                     <div class="jogador-image-container">
                         <button onClick="abrirCard(' . $jogador['codigo_jogador'] . ')" class="camisa-jogador subititulo cinza-claro-text">'
                                    . $jogador['numero_camisa'] . '</button>
                         <img src="' . $jogador['foto_user'] . '" alt="">
                     </div>
                     <p class="navegacao cinza-claro-text">' . $jogador['nome_jogador'] . '</p>
                  </div>';
                            }
                        }
                    }
                    ?>
                </div>
                <div class="zagueiro">
                    <?php
                    if (isset($visita) && is_array($visita)) {
                        foreach ($visita as $jogador) {
                            if (
                                isset($jogador['tipo_participacao'], $jogador['posicao_jogador'])
                                && $jogador['tipo_participacao'] == "T"
                                && $jogador['posicao_jogador'] == 'meio-campo'
                            ) {


                                echo '<div class="card-hide-' . $jogador['codigo_jogador'] . '">';
                                include './card-jogador/card-jogador.php';
                                echo '</div>';

                                echo '<div class="jogador-container">
                     <div class="jogador-image-container">
                         <button onClick="abrirCard(' . $jogador['codigo_jogador'] . ')" class="camisa-jogador subititulo cinza-claro-text">'
                                    . $jogador['numero_camisa'] . '</button>
                         <img src="' . $jogador['foto_user'] . '" alt="">
                     </div>
                     <p class="navegacao cinza-claro-text">' . $jogador['nome_jogador'] . '</p>
                  </div>';
                            }
                        }
                    }
                    ?>
                </div>
                <div class="goleiro">
                    <?php
                    if (isset($visita) && is_array($visita)) {
                        foreach ($visita as $jogador) {
                            if (
                                isset($jogador['tipo_participacao'], $jogador['posicao_jogador'])
                                && $jogador['tipo_participacao'] == "T"
                                && $jogador['posicao_jogador'] == 'goleiro'
                            ) {

                                $id = $jogador['codigo_jogador'];

                                echo '<div class="card-hide-' . $jogador['codigo_jogador'] . '">';
                                include './card-jogador/card-jogador.php';
                                echo '</div>';

                                echo '<div class="jogador-container">
                     <div class="jogador-image-container">
                         <button onClick="abrirCard(' . $jogador['codigo_jogador'] . ')" class="camisa-jogador subititulo cinza-claro-text">'
                                    . $jogador['numero_camisa'] . '</button>
                         <img src="' . $jogador['foto_user'] . '" alt="">
                     </div>
                     <p class="navegacao cinza-claro-text">' . $jogador['nome_jogador'] . '</p>
                  </div>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
        <section class="button-container">
            <button class="button-full navegacao" onclick="iniciarRodada(<?php echo $idPartida ?>)">Iniciar rodada</button>
            <button class="button-full navegacao" onclick="terminarRodada(<?php echo $idPartida ?>)">Terminar rodada</button>
            <button class="button-full button-verde navegacao" onclick="proximaRodada(<?php echo $idPartida ?>)"> próxima rodada</button>
            <button class="button-full button-vermelho navegacao" onclick="finalizarJogo(<?php echo $idPartida ?>)">finalizar jogo</button>
        </section>
    </main>
</body>
<!-- logica do timer -->
<script>
    function buscarDadosPartida(idPartida) {
        return $.ajax({
            url: 'http://localhost:8081/model/jogo/getTempoPartida.php?id=<?php echo $_GET['id']; ?>',
            method: 'GET',
            data: {
                codigo_partida: idPartida
            },
            dataType: 'json'
        });
    }
    let horaInicio = null; // valor padrao no passado para evitar erro no js
    let duracao = '';
    buscarDadosPartida().then(data => {
        horaInicio = data.time_stamp_inicio ?
            new Date(data.time_stamp_inicio) :
            new Date('2025-09-30 19:26:00');
        duracao = data.tempo_partida ? parseInt(data.tempo_partida) : 0;
    }).catch(error => {
        console.error('Erro ao buscar dados da partida:', error);
    })


    function atualizarTimer() {
        let agora = new Date();
        if (!horaInicio || !duracao) {
            $("#timer").text("00:00");
            return;
        }
        let fim = new Date(horaInicio.getTime() + duracao * 60000);
        let diff = Math.floor((fim - agora) / 1000);

        if (diff <= 0) {
            $("#timer").text("00:00");
            localStorage.setItem("tempoRestante", "00:00"); // salva zero quando acabar
            clearInterval(intervalo);
            return;
        }

        let minutos = Math.floor(diff / 60);
        let segundos = diff % 60;

        let tempoFormatado =
            (minutos < 10 ? "0" : "") + minutos + ":" +
            (segundos < 10 ? "0" : "") + segundos;

        $("#timer").text(tempoFormatado);

        // Salva no localStorage a cada segundo
        localStorage.setItem("tempoRestante", tempoFormatado);
    }

    // Se houver valor salvo, retoma do localStorage
    let tempoSalvo = localStorage.getItem("tempoRestante");
    if (tempoSalvo) {
        $("#timer").text(tempoSalvo);
    }

    let intervalo = setInterval(atualizarTimer, 1000);
</script>
<!-- logica dos gols -->
<script>
    function fetchGols() {
        fetch('http://localhost:8081/model/jogo/getGols.php?id=<?php echo $_GET['id']; ?>')
            .then(response => {
                if (!response.ok) {
                    throw new Error("Erro HTTP: " + response.status);
                }
                return response.json();
            })
            .then(data => {
                if (data && data.gols_casa !== undefined && data.gols_visitante !== undefined) {
                    $('#gols-casa').text(data.gols_casa);
                    $('#gols-visita').text(data.gols_visitante);
                } else {
                    $('#gols-casa').text('0');
                    $('#gols-visita').text('0');
                }
            })
            .catch(error => {
                console.error('Erro ao buscar gols:', error);
                $('#gols-casa').text('-');
                $('#gols-visita').text('-');
            });
    }

    // Atualiza a cada segundo
    setInterval(fetchGols, 1000);

    // Chama logo ao carregar
    fetchGols();
</script>
<!-- logica de abrir card -->
<script>
    function abrirCard(id) {
        const $card = $(`.card-hide-${id}, .card-show-${id}`);

        // Fecha todos os outros cards (qualquer um que esteja aberto)
        $("[class*='card-show-']").each(function() {
            const oldId = $(this).attr("class").match(/card-show-(\d+)/)[1];
            $(this).removeClass(`card-show-${oldId}`).addClass(`card-hide-${oldId}`);
        });

        // Agora abre só o clicado
        if ($card.hasClass(`card-hide-${id}`)) {
            $card.removeClass(`card-hide-${id}`).addClass(`card-show-${id}`);
        } else {
            // Se já tiver aberto, fecha
            $card.removeClass(`card-show-${id}`).addClass(`card-hide-${id}`);
        }

        // Fecha se clicar fora
        $(document).off("click.fecharCard").on("click.fecharCard", function(e) {
            if (
                !$card.is(e.target) &&
                $card.has(e.target).length === 0 &&
                !$(e.target).closest(`[onclick="abrirCard(${id})"]`).length
            ) {
                $card.removeClass(`card-show-${id}`).addClass(`card-hide-${id}`);
            }
        });
    }
</script>

<!-- botoes de controle do jogo-->
<script>
    function iniciarRodada(idPartida) {
        fetch('http://localhost:8081/model/jogo/put/AlterarTimestamp.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    codigo_partida: idPartida
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Erro HTTP: " + response.status);
                }
                return response.json();
            })
            .then(data => {
                console.log('Resposta do servidor:', data);
                if (data.success) {
                    horaInicio = data.time_stamp_inicio; 
                    console.log('Timestamp definido:', horaInicio);
                } else {
                    throw new Error(data.error || 'Erro desconhecido');
                }
            })
            .catch(error => {
                console.error('Error:', error.message);
                alert(`Erro: ${error.message}`);
            });
    }

    function terminarRodada(idPartida) {
        fetch('http://localhost:8081/model/jogo/put/FinalizaRodada.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    codigo_partida: idPartida
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Erro HTTP: " + response.status);
                }
                return response.json();
            })
            .then(data => {
                console.log('Resposta do servidor:', data);
                if (data.success) {
                    alert('Rodada iniciada com sucesso!');
                    horaInicio = data.time_stamp_inicio;
                    console.log('Timestamp definido:', horaInicio);
                } else {
                    throw new Error(data.error || 'Erro desconhecido');
                }
            })
            .catch(error => {
                console.error('Error:', error.message);
                alert(`Erro: ${error.message}`);
            });
    }

    function proximaRodada(idPartida) {
        fetch('http://localhost:8081/model/jogo/put/ProximaRodada.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    codigo_partida: idPartida
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Erro HTTP: " + response.status);
                }
                return response.json();
            })
            .then(data => {
                console.log('Resposta do servidor:', data);
                if (data.success) {
                    alert('Rodada iniciada com sucesso!');
                    horaInicio = data.time_stamp_inicio; 
                    console.log('Timestamp definido:', horaInicio);
                } else {
                    throw new Error(data.error || 'Erro desconhecido');
                }
            })
            .catch(error => {
                console.error('Error:', error.message);
                alert(`Erro: ${error.message}`);
            });
    }

    function finalizarJogo(idPartida) {
        fetch('http://localhost:8081/model/jogo/put/FinalizarPartida.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    codigo_partida: idPartida
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Erro HTTP: " + response.status);
                }
                return response.json();
            })
            .then(data => {
                console.log('Resposta do servidor:', data);
                if (data.success) {
                    alert('Jogo finalizado com sucesso!');
                    horaInicio = data.time_stamp_inicio; 
                    console.log('Timestamp definido:', horaInicio);
                } else {
                    throw new Error(data.error || 'Erro desconhecido');
                }
            })
            .catch(error => {
                console.error('Error:', error.message);
                alert(`Erro: ${error.message}`);
            });
    }
</script>

</html>