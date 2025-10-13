<?php
$path = __DIR__ . '/../../bdConfig/bdConfig.php';
if (!file_exists($path)) {
    http_response_code(500);
    echo json_encode(["error" => "Arquivo bdConfig.php não encontrado em: $path"]);
    exit;
}

require_once $path;

header('Content-Type: application/json; charset=utf-8');

$codeTime = $_GET['code_time'] ?? null;
$posicao_time = $_GET['posicao_time'] ?? null;

if (empty($codeTime) || empty($posicao_time)) {
    http_response_code(400);
    echo json_encode(["error" => "Parâmetros insuficientes. Informe 'code_time' e 'posicao_time'."]);
    exit;
}

function getJogadoresByName($posicao_time, $codigo_time)
{
    global $conn;

    try {
        $stmt = $conn->prepare("
            SELECT j.codigo_jogador, u.nome AS nome_jogador, j.posicao_time, tipo_participacao 
            FROM jogador j, usuario u 
            WHERE u.codigo_usuario = j.codigo_usuario 
            AND tipo_participacao = 'R' 
            AND posicao_time = :posicao_time 
            AND codigo_time = :codigo_time
            ORDER BY u.nome;
        ");
        $stmt->bindValue(':posicao_time', $posicao_time, PDO::PARAM_STR);
        $stmt->bindValue(':codigo_time', $codigo_time, PDO::PARAM_INT);
        $stmt->execute();

        $partida = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

$jogadores = getJogadoresByName($posicao_time, $codeTime);
echo json_encode($jogadores);
