<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registro</title>
    <?php include '../../global/php/head.php'; ?>
</head>

<body>
    <?php include '../../global/php/header/header.php';?>
    <main class="page-container">
        <div class="login-container shadow">
            <div class="icon-container">
                <img src="/global/imagens/Logo_login.svg" alt="foto de icone futeschool">
            </div>
            <form action="">
                <label for="" class="label-formulario">
                    <span class="subititulo cinza-escuro-text">Email</span>
                    <input type="email" name="email" class="subititulo cinza-escuro-text input-formulario">
                </label>
                <label for="" class="label-formulario">
                    <span class="subititulo cinza-escuro-text">Nome</span>
                    <input type="text" name="nome" class="subititulo cinza-escuro-text input-formulario">
                </label>
                <label for="" class="label-formulario">
                    <span class="subititulo cinza-escuro-text">senha</span>
                    <input type="password" name="senha" class="subititulo cinza-escuro-text input-formulario">
                </label>
                <div class="button-container">
                    <a href="/" class="button-outline subititulo">login</a>
                    <button type="submit" class="button-full subititulo">Registrar</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>