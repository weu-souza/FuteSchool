<?php
$path = '../../bdConfig/bdConfig.php';
if (!file_exists($path)) {
    die("Arquivo bdConfig.php não encontrado em: $path");
}
require_once $path;

// Função para inserir uma estatística (qualquer código de jogador e tipo de evento)

header('Content-Type: application/json');

function inserirEstatistica($codigo_partida, $codigo_jogador, $minuto_ocorrencia, $tempo_ocorrencia, $tipo_marcacao, $tipo_infracao) {
    global $conn;

    try {
        $sql = "INSERT INTO estatistica 
                (codigo_partida, codigo_jogador, minuto_ocorrencia, tempo_ocorrencia, tipo_marcacao, tipo_infracao)
                VALUES (:codigo_partida, :codigo_jogador, :minuto_ocorrencia, :tempo_ocorrencia, :tipo_marcacao, :tipo_infracao)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':codigo_partida', $codigo_partida, PDO::PARAM_INT);
        $stmt->bindValue(':codigo_jogador', $codigo_jogador, PDO::PARAM_INT);
        $stmt->bindValue(':minuto_ocorrencia', $minuto_ocorrencia, PDO::PARAM_INT);
        $stmt->bindValue(':tempo_ocorrencia', $tempo_ocorrencia, PDO::PARAM_STR);
        $stmt->bindValue(':tipo_marcacao', $tipo_marcacao, PDO::PARAM_STR);
        $stmt->bindValue(':tipo_infracao', $tipo_infracao, PDO::PARAM_STR);

        if($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Estatística inserida com sucesso']);
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
    inserirEstatistica(
        $input['codigo_partida'] ?? null,
        $input['codigo_jogador'] ?? null,
        $input['minuto_ocorrencia'] ?? null,
        $input['tempo_ocorrencia'] ?? null,
        $input['tipo_marcacao'] ?? null,
        $input['tipo_infracao'] ?? null
    );
} else {
    echo json_encode(['success' => false, 'error' => 'Nenhum dado recebido']);
}