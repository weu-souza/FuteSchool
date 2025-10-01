<?php
require '../../../model/time/CriarTimeModel.php';
require './SalvarImage.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeTime = $_POST['nomeTime'] ?? '';
    $nomeArquivo = $_POST['nomeArquivo'] ?? null;
    $base64Image = $_POST['fotoBase64'] ?? '';
    $codigo_capitao = $_SESSION['codigo_usuario'] ?? null;
    $codigo_partida = $_POST['codigo_partida'] ?? null;

    if ($base64Image) {
        $foto = salvarImagemBase64($base64Image, $nomeArquivo);
    } else {
        $foto = null;
    }
var_dump($nomeTime, $foto['caminho'],$codigo_capitao, $codigo_partida);
   $resultado = CriarTime($nomeTime, $foto['caminho'],$codigo_capitao, $codigo_partida);

    if ($resultado['sucesso']) {
        header('Location: /p/partida/');
        exit;
    } else {
        $erro = $resultado['erro'];
        echo "<p style='color:red'>{$erro} <a href='/p/partida/'>voltar</a></p>";
    }
}
