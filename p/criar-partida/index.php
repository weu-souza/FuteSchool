<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Criar partida</title>
    <?php include '../../global/php/head.php'; ?>
</head>

<body>

    
    <?php include '../../global/php/header/header.php'; ?>
    <main class="criar-partida-container">
        <form action="./php/criar-partida.php" method="POST" class="formulario-criar-partida">
            <label for="" class="label-formulario">
                <span class="navegacao cinza-escuro-text">Nome da competição</span>
                <input type="text" placeholder="digite o nome para a competição" name="nomeCompeticao" class="paragrafo cinza-escuro-text input-formulario">
            </label>
            <label for="" class="label-formulario">
                <span class="navegacao cinza-escuro-text">Data inicio</span>
                <input type="date" placeholder="data de incio da competição" name="dataInicio" class="paragrafo cinza-escuro-text input-formulario">
            </label>
            <label for="" class="label-formulario">
                <span class="navegacao cinza-escuro-text">Data fim</span>
                <input type="date" placeholder="data fim, caso seja partida casual digite a mesma data do incio" name="dataFim" class="paragrafo cinza-escuro-text input-formulario">
            </label>
            <!-- tipo partida casual torneio -->
            <legend class="navegacao cinza-escuro-text">Selecione o tipo de partida: casual para confronto entre 2 times e torneio para mais times</legend>
            <div class="tipo-partida">
                    <label for="casual" class="label-radio">
                        <input type="radio" name="tipo_partida" id="casual" value="C" class=" cinza-escuro-text input-radio">
                        <span class="navegacao cinza-escuro-text">casual</span>
                    </label>
                    <label for="torneio" class="label-radio">
                        <input type="radio" name="tipo_partida" id="torneio" value="T" class=" cinza-escuro-text input-radio">
                        <span class="navegacao cinza-escuro-text">torneio</span>
                    </label>

            </div>
            <label for="" id="qtdTimeShowHiden" class="label-formulario hidden">
                <span class="navegacao cinza-escuro-text">Quantidade de times</span>
                <input type="text" name="qtdTime" placeholder="quantidade de times que vão participar do torneio" class="paragrafo cinza-escuro-text input-formulario">
            </label>

            <!-- quantidade de minutos entre um tempo e outro -->
            <label for="" class="label-formulario">
                <span class="navegacao cinza-escuro-text">Tempo</span>
                <input type="number" name="tempo" placeholder="não defina o tempo completo da partida, somente de cada intervalo" class="paragrafo cinza-escuro-text input-formulario">
            </label>
            <div class="btn-criar-partida-container">
                <button type="submit" class="button-full navegacao ">Criar</button>
            </div>
        </form>
    </main>
</body>
<script>
    const $casual = $("#casual");
    const $torneio = $("#torneio");
    const $qtdTime = $("#qtdTimeShowHiden");
    $("input[name='tipo_partida']").on("change", function() {
        if ($torneio.is(":checked")) {
            $qtdTime.removeClass("hidden").addClass("show");
        } else {
            $qtdTime.removeClass("show").addClass("hidden");
        }
    });
</script>

</html>