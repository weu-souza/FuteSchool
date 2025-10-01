<?php
$path = '../../bdConfig/bdConfig.php';
if (!file_exists($path)) {
    die("Arquivo bdConfig.php não encontrado em: $path");
}
require_once $path;

// Função para inserir uma estatística (qualquer código de jogador e tipo de evento)

header('Content-Type: application/json');
date_default_timezone_set('America/Sao_Paulo');
function ProximaRodada($codigo_partida)
{
    global $conn;

    // Usa o horário atual do servidor
    $tempo = date("Y-m-d H:i:s");
    $tempoAtual = "S";

    try {
        $sql = "UPDATE partida 
                SET time_stamp_inicio = :tempo, tempo_atual = :tempoAtual
                WHERE codigo_partida = :codigo_partida";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':codigo_partida', $codigo_partida, PDO::PARAM_INT);
        $stmt->bindValue(':tempo', $tempo, PDO::PARAM_STR);
        $stmt->bindValue(':tempoAtual', $tempoAtual, PDO::PARAM_STR);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Timestamp atualizado com sucesso',
                    'timestamp' => $tempo // Retorna o timestamp usado
                ]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Nenhuma partida encontrada com esse código']);
            }
        } else {
            $errorInfo = $stmt->errorInfo();
            echo json_encode(['success' => false, 'error' => $errorInfo[2]]);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}

$input = json_decode(file_get_contents('php://input'), true);

if ($input && isset($input['codigo_partida'])) {
    ProximaRodada($input['codigo_partida']);
} else {
    echo json_encode(['success' => false, 'error' => 'Dados incompletos ou não recebidos']);
}
