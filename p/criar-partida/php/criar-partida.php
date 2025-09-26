<?php
require '../../../model/partida/criarPartidaModel.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeCompeticao = $_POST['nomeCompeticao'] ?? '';
    $dataInicio  = $_POST['dataInicio']  ?? '';
    $dataFim = $_POST['dataFim'] ?? '';
    $tipo_partida = $_POST['tipo_partida'] ?? '';
    $qtdTime = $_POST['qtdTime'] ?? '';
    $tempo = $_POST['tempo'] ?? '';
    $codigo_arbitro = $_SESSION['codigo_usuario'] ?? '';

    echo $tipo_partida;
    $resultado = CriarPartida($nomeCompeticao, $dataInicio, $dataFim, $tipo_partida, $qtdTime, $tempo, $codigo_arbitro);

    if ($resultado['sucesso']) {
        header('Location: /p/partida/');
        exit;
    } else {
        $erro = $resultado['erro'];
        echo "<p style='color:red'>{$erro} <a href='/p/criar-partida/'>voltar</a></p>";
    }
}
