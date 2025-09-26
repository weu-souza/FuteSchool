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
        <section class="timer-container">
            <div class="top-container">
                <p class="subititulo cinza-escuro-text">data</p>
                <div class="casual-torneio subititulo cinza-escuro-text">
                    <i class="fa-solid fa-futbol"></i>
                    <p>casual</p>
                </div>
            </div>
            <div class="bottom-container">
                <div class="time-container">
                    <img src="/global/imagens/time_placeholder/flamengo.png" alt="">
                    <p class="subititulo cinza-escuro-text">Time</p>
                    <p class="subititulo cinza-escuro-text">2</p>
                </div>
                <p id="timer" class="subititulo cinza-escuro-text">00:00</p>
                <div class="time-container">
                    <img src="/global/imagens/time_placeholder/corintians-image.png" alt="">
                    <p class="subititulo cinza-escuro-text">Time</p>
                    <p class="subititulo cinza-escuro-text">2</p>
                </div>
            </div>
        </section>
        <section class="gramado-container">
            <!-- time 1 -->
            <div class="time-primeiro">
                <div class="goleiro">
                    <?php $id = 1;
                    $nome = "Rafael"; ?>
                    <div class="card-hide-<?php echo $id; ?>">
                        <?php include './card-jogador/card-jogador.php'; ?>
                    </div>

                    <?php
                    echo '<div  class="jogador-container">
                     <div class="jogador-image-container">
                     <button onClick="abrirCard(' . $id . ')" class="camisa-jogador subititulo cinza-claro-text">10</button>
                     <img src="/global/imagens/time_placeholder/placeholder_user.jpg" alt="">
                    </div>
                    <p class="navegacao cinza-claro-text">' . $nome . '</p>
                    </div>';
                    ?>
                </div>
                <div class="zagueiro">
                    <?php $id = 2;
                    $nome = "Jose"; ?>
                    <div class="card-hide-<?php echo $id; ?>">
                        <?php include './card-jogador/card-jogador.php'; ?>
                    </div>

                    <?php
                    echo '<div  class="jogador-container">
                     <div class="jogador-image-container">
                     <button onClick="abrirCard(' . $id . ')" class="camisa-jogador subititulo cinza-claro-text">10</button>
                     <img src="/global/imagens/time_placeholder/placeholder_user.jpg" alt="">
                    </div>
                    <p class="navegacao cinza-claro-text">' . $nome . '</p>
                    </div>';
                    ?>
                    <?php $id = 3;
                    $nome = "Jose"; ?>
                    <div class="card-hide-<?php echo $id; ?>">
                        <?php include './card-jogador/card-jogador.php'; ?>
                    </div>

                    <?php
                    echo '<div  class="jogador-container">
                     <div class="jogador-image-container">
                     <button onClick="abrirCard(' . $id . ')" class="camisa-jogador subititulo cinza-claro-text">10</button>
                     <img src="/global/imagens/time_placeholder/placeholder_user.jpg" alt="">
                    </div>
                    <p class="navegacao cinza-claro-text">' . $nome . '</p>
                    </div>';
                    ?>

                </div>
                <div class="meio-campo">
                    <?php $id = 4;
                    $nome = "Gabriel"; ?>
                    <div class="card-hide-<?php echo $id; ?>">
                        <?php include './card-jogador/card-jogador.php'; ?>
                    </div>

                    <?php
                    echo '<div  class="jogador-container">
                     <div class="jogador-image-container">
                     <button onClick="abrirCard(' . $id . ')" class="camisa-jogador subititulo cinza-claro-text">10</button>
                     <img src="/global/imagens/time_placeholder/placeholder_user.jpg" alt="">
                    </div>
                    <p class="navegacao cinza-claro-text">' . $nome . '</p>
                    </div>';
                    ?>

                    <?php $id = 5;
                    $nome = "Amilton"; ?>
                    <div class="card-hide-<?php echo $id; ?>">
                        <?php include './card-jogador/card-jogador.php'; ?>
                    </div>

                    <?php
                    echo '<div  class="jogador-container">
                     <div class="jogador-image-container">
                     <button onClick="abrirCard(' . $id . ')" class="camisa-jogador subititulo cinza-claro-text">10</button>
                     <img src="/global/imagens/time_placeholder/placeholder_user.jpg" alt="">
                    </div>
                    <p class="navegacao cinza-claro-text">' . $nome . '</p>
                    </div>';
                    ?>
                </div>
            </div>
            <!-- time 2 -->
            <div class="time-segundo">
                <div class="meio-campo">
                    <?php $id = 6;
                    $nome = "Robson"; ?>
                    <div class="card-hide-<?php echo $id; ?>">
                        <?php include './card-jogador/card-jogador.php'; ?>
                    </div>

                    <?php
                    echo '<div  class="jogador-container">
                     <div class="jogador-image-container">
                     <button onClick="abrirCard(' . $id . ')" class="camisa-jogador subititulo cinza-claro-text">10</button>
                     <img src="/global/imagens/time_placeholder/placeholder_user.jpg" alt="">
                    </div>
                    <p class="navegacao cinza-claro-text">' . $nome . '</p>
                    </div>';
                    ?>

                    <?php $id = 7;
                    $nome = "Jose"; ?>
                    <div class="card-hide-<?php echo $id; ?>">
                        <?php include './card-jogador/card-jogador.php'; ?>
                    </div>

                    <?php
                    echo '<div  class="jogador-container">
                     <div class="jogador-image-container">
                     <button onClick="abrirCard(' . $id . ')" class="camisa-jogador subititulo cinza-claro-text">10</button>
                     <img src="/global/imagens/time_placeholder/placeholder_user.jpg" alt="">
                    </div>
                    <p class="navegacao cinza-claro-text">' . $nome . '</p>
                    </div>';
                    ?>
                </div>
                <div class="zagueiro">
                    <?php $id = 8;
                    $nome = "Lindomar"; ?>
                    <div class="card-hide-<?php echo $id; ?>">
                        <?php include './card-jogador/card-jogador.php'; ?>
                    </div>

                    <?php
                    echo '<div class="jogador-container">
                     <div class="jogador-image-container">
                     <button  onClick="abrirCard(' . $id . ')" class="camisa-jogador subititulo cinza-claro-text">10</button>
                     <img src="/global/imagens/time_placeholder/placeholder_user.jpg" alt="">
                    </div>
                    <p class="navegacao cinza-claro-text">' . $nome . '</p>
                    </div>';
                    ?>

                    <?php $id = 9;
                    $nome = "Amilton"; ?>
                    <div class="card-hide-<?php echo $id; ?>">
                        <?php include './card-jogador/card-jogador.php'; ?>
                    </div>

                    <?php
                    echo '<div  class="jogador-container">
                     <div class="jogador-image-container">
                     <button onClick="abrirCard(' . $id . ')" class="camisa-jogador subititulo cinza-claro-text">10</button>
                     <img src="/global/imagens/time_placeholder/placeholder_user.jpg" alt="">
                    </div>
                    <p class="navegacao cinza-claro-text">' . $nome . '</p>
                    </div>';
                    ?>
                </div>
                <div class="goleiro">
                    <?php $id = 10;
                    $nome = "Silas"; ?>
                    <div class="card-hide-<?php echo $id; ?>">
                        <?php include './card-jogador/card-jogador.php'; ?>
                    </div>

                    <?php
                    echo '<div  class="jogador-container">
                     <div class="jogador-image-container">
                     <button onClick="abrirCard(' . $id . ')" class="camisa-jogador subititulo cinza-claro-text">10</button>
                     <img src="/global/imagens/time_placeholder/placeholder_user.jpg" alt="">
                    </div>
                    <p class="navegacao cinza-claro-text">' . $nome . '</p>
                    </div>';
                    ?>
                </div>
            </div>
        </section>
        <section class="button-container">
            <button class="button-full navegacao">Terminar rodada</button>
            <button class="button-full button-verde navegacao"> próxima rodada</button>
            <button class="button-full button-vermelho navegacao">finalizar jogo</button>
        </section>
    </main>
</body>
<script>
    $(function() {
        let tempo = $("#timer").text().split(":");
        let minutos = parseInt(tempo[0], 10);
        let segundos = parseInt(tempo[1], 10);

        function atualizarTimer() {
            if (segundos === 0) {
                if (minutos === 0) {
                    clearInterval(intervalo);
                    $("#timer").text("00:00");
                    return;
                }
                minutos--;
                segundos = 59;
            } else {
                segundos--;
            }

            let m = minutos < 10 ? "0" + minutos : minutos;
            let s = segundos < 10 ? "0" + segundos : segundos;

            $("#timer").text(m + ":" + s);
        }

        let intervalo = setInterval(atualizarTimer, 1000);
    });

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

</html>