<?php
require '../../../model/time/InscreverTimeModel.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nmrCamisa = $_POST['nmrCamisa'] ?? '';
    $posicaoTime = $_POST['posicaoTime'] ?? null;
    $funcaoTime = $_POST['funcaoTime'] ?? '';
    $codigo_partida = $_POST['codigo_partida'] ?? null;
    $codigo_time = $_POST['codigo_time'] ?? null;
    $codigo_usuario = $_SESSION['codigo_usuario'] ?? null;

    echo $codigo_usuario, $nmrCamisa, $posicaoTime, $funcaoTime, $codigo_time, $codigo_partida;
    $resultado = InscreverJogador($codigo_usuario, $nmrCamisa, $posicaoTime, $funcaoTime, $codigo_time, $codigo_partida);

    if ($resultado['sucesso']) {
        header('Location: /p/partida/');
        exit;
    } else {
        $erro = $resultado['erro'];
        echo $erro;
       return ['sucesso' => true, 'codigo_time' => $codigo_time];
}
    }

