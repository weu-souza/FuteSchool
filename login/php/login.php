<?php
session_start();
if ($_POST['email'] == 'weuller@email.com' && $_POST['senha'] == '123') {
    $_SESSION['usuario'] = 'logado';
    header('Location: /p/home');
}
