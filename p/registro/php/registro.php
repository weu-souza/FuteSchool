<?php
require '../../../model/registro/registroModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $nome  = $_POST['nome']  ?? '';
    $senha = $_POST['senha'] ?? '';

    $resultado = registro($email, $senha, $nome);

    if ($resultado['sucesso']) {
        header('Location: /');
        exit;
    } else {
        $erro = $resultado['erro']; // mensagem detalhada do registroModel
        echo "<p style='color:red'>{$erro} <a href='/p/registro'>voltar</a></p>";
    }
}
