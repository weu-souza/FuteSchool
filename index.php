<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="global/css/reset.css">
    <link rel="stylesheet" href="global/css/variaveis.css">
    <link rel="stylesheet" href="global/php/header/style.css">
    <link rel="stylesheet" href="login/css/style.css">
</head>

<body>
    <?php include 'global/php/header/header.php'; ?>
    <main class="page-container">
        <div class="login-container shadow">
            <div class="icon-container">
                <img src="/global/imagens/Logo_login.svg" alt="foto de icone futeschool">
            </div>
            <form action="login/php/login.php" method="POST" class="formulario">
                <label for="" class="label-formulario">
                    <span class="subititulo cinza-escuro-text">Email</span>
                    <input type="email" name="email" class="subititulo cinza-escuro-text input-formulario">
                </label>
                <label for="" class="label-formulario">
                    <span class="subititulo cinza-escuro-text">senha</span>
                    <input type="password" name="senha" class="subititulo cinza-escuro-text input-formulario">
                </label>
                <div class="button-container">
                    <a href="/p/registro/" class="button-outline subititulo">REGISTRO</a>
                    <button type="submit" class="button-full subititulo">LOGAR</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>