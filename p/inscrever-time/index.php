<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Inscrever time</title>
    <?php include '../../global/php/head.php'; ?>
</head>

<body>
    <?php include '../../global/php/header/header.php'; ?>
    <main class="criar-time-container">
        <form class="formulario-criar-time" action="./php/inscrever-time.php" method="POST">
            <label for="" class="label-formulario">
                <span class="navegacao cinza-escuro-text">Numero da camisa</span>
                <input type="number" placeholder="Digite o número da sua camisa" name="nmrCamisa" class="paragrafo cinza-escuro-text input-formulario">
            </label>

            <label for="" class="label-formulario">
                <span class="navegacao cinza-escuro-text">Posição no time</span>
                <input type="text" placeholder="digite sua posição no time" name="posicaoTime" class="paragrafo cinza-escuro-text input-formulario">
            </label>
            <input type="hidden" name="codigo_partida" value="<?php echo $_GET['partida'] ?? ''; ?>">
            <input type="hidden" name="codigo_time" value="<?php echo $_GET['time'] ?? ''; ?>">
            <label for="funcaoTime" class="label-formulario">
                <span class="navegacao cinza-escuro-text">Titular ou reserva</span>
                <select class="paragrafo cinza-escuro-text input-formulario" name="funcaoTime" id="funcaoTime">
                    <option value="default">Escolha uma opção</option>
                    <option value="T">Titular</option>
                    <option value="R">Reserva</option>
                </select>
            </label>

            <div class="btn-criar-time-container">
                <button type="submit" class="button-full navegacao ">Registrar</button>
            </div>
        </form>

    </main>

</body>

</html>