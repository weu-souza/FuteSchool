<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

include_once '../bdConfig/bdConfig.php';
require_once './getJogo.php'; // Inclui suas funções existentes

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

$input = json_decode(file_get_contents('php://input'), true);
$codigo_partida = $input['codigo_partida'] ?? $_GET['id'] ?? null;

if ($codigo_partida) {
    $tempo = getTempoPartidaByPartidaId($codigo_partida);
    
    if ($tempo) {
        echo json_encode([
            'success' => true,
            'time_stamp_inicio' => $tempo['time_stamp_inicio'] ?? null,
            'tempo_partida' => $tempo['tempo_partida'] ?? 0
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'error' => 'Partida não encontrada'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'error' => 'Código da partida não fornecido'
    ]);
}
?>