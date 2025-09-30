<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Time</title>
    <?php include '../../global/php/head.php'; ?>
</head>

<body>
    <?php include '../../global/php/header/header.php'; ?>
    <main>
        <?php
        require_once '../../model/time/getByTimeId.php';
        $codigo_Time = $_GET['id'] ?? 0;
        $card = getCardTimeById($codigo_Time);
        $jogador = getJogadorTimeById($codigo_Time);
        $gols =  getGolsTimeById($codigo_Time);

        echo ' <section class="top-container">
            <div class="title">
                <h3 class="subititulo cinza-escuro-text">' . $card['nome_time'] . '</h3>
            </div>
            <div class="container-pessoas">
                <!-- aqui vem o get de arbitro -->
                <div class="jogador-card">
                    <div class="jogador-title">
                        <h3 class="navegacao cinza-escuro-text">Arbitro</h3>
                    </div>
                    <div class="jogador-meio">
                        <div class="image-jogador-container">
                            <img src="' . $card['foto_arbitro'] . '" alt="avatar" width="50">
                        </div>
                        <div class="texto-container">
                            <p class="paragrafo cinza-escuro-text">' . $card['nome_arbitro'] . '</p>
                            <p class="paragrafo cinza-escuro-text">Arbitro</p>
                        </div>
                    </div>
                </div>
                <!-- aqui vem o get de capitão -->
                <div class="jogador-card">
                    <div class="jogador-title">
                        <h3 class="navegacao cinza-escuro-text">Capitão</h3>
                    </div>
                    <div class="jogador-meio">
                        <div class="image-jogador-container">
                            <img src="' . $card['foto_capitao'] . '" alt="avatar" width="50">
                        </div>
                        <div class="texto-container">
                            <p class="paragrafo cinza-escuro-text">' . $card['nome_capitao'] . '</p>
                            <p class="paragrafo cinza-escuro-text">Capitão</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="jogadores-container">
            <div class="container-pessoas">
                <!-- aqui vem o get de jogador que mas fez gols -->
                <div class="jogador-card">
                    <div class="jogador-title">
                        <h3 class="navegacao cinza-escuro-text">Artilheiro</h3>
                    </div>
                    <div class="jogador-meio">
                        <div class="imagem-best-container">
                            <div class="image-best-player">
                                <i class="fa-solid fa-crown"></i>
                                <img src="' . $card['foto_artilheiro'] . '" alt="avatar" width="50">
                            </div>
                        </div>
                        <div class="texto-container">
                            <p class="paragrafo cinza-escuro-text">' . $card['artilheiro'] . '</p>
                            <p class="paragrafo cinza-escuro-text">' . $card['posicao_artilheiro'] . '</p>
                        </div>
                    </div>
                </div>
                <!-- aqui vem o get de goleiro que mais defendeu -->
                <div class="jogador-card">
                    <div class="jogador-title">
                        <h3 class="navegacao cinza-escuro-text">Goleiro menos vazado</h3>
                    </div>
                    <div class="jogador-meio">
                        <div class="imagem-best-container">
                            <div class="image-best-player">
                                <i class="fa-solid fa-crown"></i>
                                <img src="' . $card['foto_goleiro'] . '" alt="avatar" width="50">
                            </div>
                        </div>
                        <div class="texto-container">
                            <p class="paragrafo cinza-escuro-text">' . $card['goleiro_menos_vazado'] . '</p>
                            <p class="paragrafo cinza-escuro-text">' . $card['posicao_goleiro'] . '</p>
                        </div>
                    </div>
                </div>
            </div>';

        // <!-- aqui vem o get de jogadores no time -->
        foreach ($jogador as $jog) {
            echo '
            <div class="card-jogador">
                <div class="image-container"><img src="' . $jog['foto_user'] . '" alt="avatar" width="50"></div>
                <table class="tabela">
                    <thead>
                        <tr>
                            <th class="titulo-tabela preto-text">Nome</th>
                            <th class="titulo-tabela preto-text">Gols</th>
                            <th class="titulo-tabela preto-text">Defesa</th>
                            <th class="titulo-tabela preto-text">Numero</th>
                            <th class="titulo-tabela preto-text">Falta</th>
                            <th class="titulo-tabela preto-text">Posição</th>
                            <th class="titulo-tabela preto-text">Cartões</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="paragrafo cinza-escuro-text">' . $jog['nome_jogador'] . '</td>
                            <td class="paragrafo cinza-escuro-text">' . $jog['qtd_gols'] . '</td>
                            <td class="paragrafo cinza-escuro-text">' . $jog['qtd_defesas'] . '</td>
                            <td class="paragrafo cinza-escuro-text">' . $jog['numero_camisa'] . '</td>
                            <td class="paragrafo cinza-escuro-text">' . $jog['qtd_faltas'] . '</td>
                            <td class="paragrafo cinza-escuro-text">' . $jog['posicao_jogador'] . '</td>
                            <td class="cartoes">
                                <span class="cartao-amarelo paragrafo preto-text">' . $jog['qtd_cartao_amarelo'] . '</span>
                                <span class="cartao-vermelho paragrafo cinza-claro-text">' . $jog['qtd_cartao_vermelho'] . '</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>';
        }
        echo ' </section>'
        ?>
        <!-- aqui vem o get de gols nessa partida -->
        <section class="gols-container">
            <div class="title">
                <h3 class="subititulo cinza-escuro-text"> Gols</h3>
                <p class="subititulo cinza-escuro-text"><?php 
                echo isset($gols[0]['total_gols_time']) && $gols[0]['total_gols_time'] > 0 
    ? $gols[0]['total_gols_time'] 
    : 'Nenhum gol marcado';
                ?></p>
            </div>
            <div class="gol-card-container">
                <!-- fazer o get de gols aqui -->
                <?php
                foreach ($gols as $gol) {
                    echo '
        <div class="gol-card">
            <div class="gol-title">
            <p class="navegacao cinza-escuro-text">Gols</p>
        </div>
        <div class="gol-meio-container">
            <div>
                <p class="subititulo cinza-escuro-text">01</p>
            </div>
            <div class="tempo-container">
                <p class="paragrafo cinza-escuro-text">'
                        . ($gol['tempo_ocorrencia'] == "P"
                            ? "Primeiro"
                            : ($gol['tempo_ocorrencia'] == "S" ? "Segundo" : ""))
                        . '</p>
                <p class="paragrafo cinza-escuro-text">' . $gol['minuto_ocorrencia'] . ':00</p>
            </div>
        </div>
        </div>';
                }
                ?>

            </div>

        </section>

    </main>
</body>

</html>