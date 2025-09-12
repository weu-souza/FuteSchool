<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="global/css/reset.css">
    <link rel="stylesheet" href="global/css/variaveis.css">
    <link rel="stylesheet" href="global/php/header/style.css">
    <link rel="stylesheet" href="login/css/style.css">

    <!-- font roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- font poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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