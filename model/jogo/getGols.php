<?php
$path = __DIR__ . '/../bdConfig/bdConfig.php';
if (!file_exists($path)) {
    http_response_code(500);
    echo json_encode(["error" => "Arquivo bdConfig.php não encontrado em: $path"]);
    exit;
}
require_once $path;

// força cabeçalho JSON
header('Content-Type: application/json; charset=utf-8');

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "ID não informado"]);
    exit;
}

$id = intval($_GET['id']);

function getPartidaById($codigo_partida)
{
    global $conn; // puxa do bdConfig

    try {
        $stmt = $conn->prepare("
            SELECT gols_casa, gols_visitante
            FROM partidas_view
            WHERE codigo_partida = :codigo_partida
        ");
        $stmt->bindValue(':codigo_partida', $codigo_partida, PDO::PARAM_INT);
        $stmt->execute();

        $partida = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$partida) {
            http_response_code(404);
            return ["error" => "Partida não encontrada"];
        }

        return $partida;
    } catch (Exception $e) {
        http_response_code(500);
        return ["error" => "Erro no banco de dados: " . $e->getMessage()];
    }
}

$partida = getPartidaById($id);
echo json_encode($partida);
