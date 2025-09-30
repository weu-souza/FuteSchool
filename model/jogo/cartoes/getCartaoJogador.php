<?php
$path = '../../bdConfig/bdConfig.php';
if (!file_exists($path)) {
    die("Arquivo bdConfig.php não encontrado em: $path");
}
require_once $path;
// força cabeçalho JSON
header('Content-Type: application/json; charset=utf-8');

if (!isset($_GET['codigo_jogador'])) {
    http_response_code(400);
    echo json_encode(["error" => "ID não informado"]);
    exit;
}
if (!isset($_GET['codigo_partida'])) {
    http_response_code(400);
    echo json_encode(["error" => "ID não informado"]);
    exit;
}

$codigo_jogador = intval($_GET['codigo_jogador']);
$codigo_partida = intval($_GET['codigo_partida']);

function getCataoJogador($codigo_jogador, $codigo_partida)
{
    global $conn;

    $stmt = $conn->prepare("SELECT qtd_cartao_amarelo, qtd_cartao_vermelho FROM vw_time_jogadores WHERE codigo_partida = :codigo_partida and codigo_jogador = :codigo_jogador");
    $stmt->bindValue(':codigo_partida', $codigo_partida, PDO::PARAM_INT);
    $stmt->bindValue(':codigo_jogador', $codigo_jogador, PDO::PARAM_INT);
    $stmt->execute();

    $time = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$time) {
        return null;
    }

    return $time;
}

$cartoes = getCataoJogador($codigo_jogador, $codigo_partida);
echo json_encode($cartoes);
