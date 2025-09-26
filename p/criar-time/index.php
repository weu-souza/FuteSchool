<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Criar time</title>
    <?php include '../../global/php/head.php'; ?>
</head>

<body>
    <?php include '../../global/php/header/header.php'; ?>
    <main class="criar-time-container">
        <form class="formulario-criar-time" method="post" action="./php/CriarTime.php" enctype="multipart/form-data">

            <label for="" class="label-formulario">
                <span class="navegacao cinza-escuro-text">Nome do time</span>
                <input type="text" placeholder="digite o nome para seu time" name="nomeTime" class="paragrafo cinza-escuro-text input-formulario">
            </label>
            <label for="" class="label-formulario">
                <span class="navegacao cinza-escuro-text">Quantidade de jogadores</span>
                <input type="number" placeholder="digite a quantidade de jogadores" name="qtdjogadores" class="paragrafo cinza-escuro-text input-formulario">
            </label>
            <!-- imagem -->
            <div class="foto">
                <label for="formFile" id="span_imagem" class="form-label img-label">
                    <div id="img">
                        <span class="navegacao cinza-escuro-text">Escolha uma imagem</span>
                    </div>
                </label>
                <input type="file" accept="image/*" name="foto" id="formFile">
            </div>
            <input type="hidden" name="fotoBase64" id="fotoBase64">
            <input type="hidden" name="nomeArquivo" id="nomeArquivo">
            <input type="hidden" name="codigo_partida" id="id" value="<?php echo isset($_GET['partida']) ? $_GET['partida'] : '' ?>">
            <div class="btn-criar-time-container">
                <button type="submit" class="button-full navegacao ">Cadastrar</button>
            </div>
        </form>

    </main>

</body>
<script>
    //image
    let base64String = '';
    let file = ''
    $('#formFile').on('change', function(event) {
        file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', (e) => {
                base64String = e.target.result;

                $('#span_imagem').css({
                    'border': 'none',
                    'background': 'none'
                });
                $('#img').html(`<img src="${base64String}" class="img">`);
                $('#fotoBase64').val(base64String);
                $('#nomeArquivo').val(file ? file.name : '');
            });

            reader.readAsDataURL(file);
        } else {
            console.log('Nenhum arquivo selecionado.');
            $('#img').html('<span class="navegacaos">Escolha uma imagem</span>');
        }

    });
</script>

</html>