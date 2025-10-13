<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Criar time</title>
    <?php include '../../global/php/head.php'; ?>
</head>

<body>
    <?php include '../../global/php/header/header.php'; ?>
    <main>
        <section class="casual">
            <div class="titulo-container">
                <h3 class="subititulo cinza-escuro-text">Casual</h3>
            </div>
            <?php
            require_once '../../model/historico/getHistorico.php';

            $historico = getHistorico();

            if ($historico) {
                foreach ($historico as $partida) {
                    echo '<div class="card-partidas">';
                    echo '<div class="card-top">';
                    echo '<p class="navegacao cinza-escuro-text">' . $partida['data_partida'] . '</p>';
                    echo '<p class="navegacao cinza-escuro-text"><i class="fa-solid fa-futbol"></i> ' . count($partida['times']) . '</p>';
                    echo '</div>';

                    // loop pelos times dessa partida
                    foreach ($partida['times'] as $time) {
                        echo '<div class="card-time">';
                        echo '<a href="/p/time?id=' . $time['codigo_time'] . '" class="card-time-content">';
                        echo '<div class="image-container"><img src="' . $time['foto'] . '" alt="avatar" width="50"></div>';
                        echo '<table class="tabela">';
                        echo '<thead>';
                        echo '<tr>
                    <th class="titulo-tabela preto-text">Nome</th>
                    <th class="titulo-tabela preto-text">Gols</th>
                    <th class="titulo-tabela preto-text">Defesa</th>
                    <th class="titulo-tabela preto-text">Jogadores</th>
                    <th class="titulo-tabela preto-text">Falta</th>
                    <th class="titulo-tabela preto-text">Cartões</th>
                  </tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        echo '<tr>
                    <td class="paragrafo cinza-escuro-text">' . $time['nome'] . '</td>
                    <td class="paragrafo cinza-escuro-text">' . $time['gols'] . '</td>
                    <td class="paragrafo cinza-escuro-text">' . $time['defesas'] . '</td>
                    <td class="paragrafo cinza-escuro-text">' . $time['quantidade_jogadores'] . '</td>
                    <td class="paragrafo cinza-escuro-text">' . $time['faltas'] . '</td>
                    <td class="cartoes">
                        <span class="cartao-amarelo paragrafo preto-text">' . $time['cartoes_amarelos'] . '</span>
                        <span class="cartao-vermelho paragrafo cinza-claro-text">' . $time['cartoes_vermelhos'] . '</span>
                    </td>
                  </tr>';
                        echo '</tbody>';
                        echo '</table>';
                        echo '</a>';
                        echo '</div>'; // fecha card-time
                    }

                    echo '</div>'; // fecha card-partidas
                }
            }else{
            echo '<h3 class="subititulo cinza-escuro-text">Nenhuma partida encontrada</h3>';
            }
            ?>
        </section>
    </main>

</body>


</html>