<?php
require '../../model/login/loginModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    if (login($email, $senha)) {
        header('Location: /p/home/');
        exit;
    } else {
        $erro = "Usuário ou senha incorretos <a href='/'>voltar para login</a>";
        echo $erro;
    }
}
