<?php
$path = '../../bdConfig/bdConfig.php';
if (!file_exists($path)) {
    die("Arquivo bdConfig.php não encontrado em: $path");
}
require_once $path;
header('Content-Type: application/json');
function removerCartao($codigo_jogador, $tipo_infracao) {
    global $conn;

    if (!$codigo_jogador || !$tipo_infracao) {
        echo json_encode(['success' => false, 'error' => 'Parâmetros inválidos']);
        return;
    }

    try {
         $sql = "
        WITH deletar AS (
            SELECT codigo_estatistica
            FROM estatistica
            WHERE codigo_jogador = :codigo_jogador
              AND tipo_infracao = :tipo_infracao
            ORDER BY codigo_estatistica DESC
            LIMIT 1
        )
        DELETE FROM estatistica
        WHERE codigo_estatistica IN (SELECT codigo_estatistica FROM deletar);
    ";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':codigo_jogador', $codigo_jogador, PDO::PARAM_INT);
        $stmt->bindValue(':tipo_infracao', $tipo_infracao, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Cartão removido com sucesso']);
        } else {
            $errorInfo = $stmt->errorInfo();
            echo json_encode(['success' => false, 'error' => $errorInfo[2]]);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}

// Recebendo os dados do fetch
$input = json_decode(file_get_contents('php://input'), true);

if ($input) {
    removerCartao(
        $input['codigo_jogador'] ?? null,
        $input['tipo_infracao'] ?? null
    );
} else {
    echo json_encode(['success' => false, 'error' => 'Nenhum dado recebido']);
}