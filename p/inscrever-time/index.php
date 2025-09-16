<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Historico</title>
    <?php include '../../global/php/head.php'; ?>
</head>

<body>
    <?php include '../../global/php/header/header.php'; ?>
    <main class="criar-time-container">
        <form class="formulario-criar-time">

            <label for="" class="label-formulario">
                <span class="navegacao cinza-escuro-text">Nome do time</span>
                <input type="text" placeholder="digite o nome para seu time" name="nomeCompeticao" class="paragrafo cinza-escuro-text input-formulario">
            </label>
            <label for="" class="label-formulario">
                <span class="navegacao cinza-escuro-text">Numero da camisa</span>
                <input type="number" placeholder="Digite o número da sua camisa" name="nomeCompeticao" class="paragrafo cinza-escuro-text input-formulario">
            </label>

            <label for="" class="label-formulario">
                <span class="navegacao cinza-escuro-text">Posição no time</span>
                <input type="text" placeholder="digite sua posição no time" name="nomeCompeticao" class="paragrafo cinza-escuro-text input-formulario">
            </label>
            <label for="" class="label-formulario">
                <span class="navegacao cinza-escuro-text">Titular ou reserva</span>
                <select class="paragrafo cinza-escuro-text input-formulario">
                    <option value="titular">Escolha uma opção</option>
                    <option value="titular">Titular</option>
                    <option value="reserva">Reserva</option>
                </select>
            </label>

            <div class="btn-criar-time-container">
                <button type="submit" class="button-full navegacao ">Registrar</button>
            </div>
        </form>

    </main>

</body>

</html>