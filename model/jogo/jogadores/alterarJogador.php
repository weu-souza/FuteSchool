<?php
header('Content-Type: application/json; charset=utf-8');

// Ler JSON do corpo da requisição
$input = json_decode(file_get_contents('php://input'), true);

$titular_id = isset($input['titular_id']) ? (int)$input['titular_id'] : null;
$reserva_id  = isset($input['reserva_id'])  ? (int)$input['reserva_id']  : null;

if (!$titular_id || !$reserva_id) {
    http_response_code(400);
    echo json_encode(['error' => 'Parâmetros insuficientes: titular_id e reserva_id são obrigatórios.']);
    exit;
}

if ($titular_id === $reserva_id) {
    echo json_encode(['message' => 'Nenhuma alteração necessária (mesmo jogador).']);
    exit;
}

// include da conexão (ajuste o path conforme seu projeto)
$path = __DIR__ . '/../../bdConfig/bdConfig.php';
if (!file_exists($path)) {
    http_response_code(500);
    echo json_encode(['error' => "Arquivo bdConfig.php não encontrado em: $path"]);
    exit;
}
require_once $path; // espera-se que $conn seja criado aqui (PDO)

try {
    // inicia transação
    $conn->beginTransaction();

    // Busca os dois jogadores e seus tipos de participação
    $stmt = $conn->prepare("
        SELECT codigo_jogador, tipo_participacao, codigo_time
        FROM jogador
        WHERE codigo_jogador IN (:a, :b)
        FOR UPDATE
    ");
    $stmt->bindValue(':a', $titular_id, PDO::PARAM_INT);
    $stmt->bindValue(':b', $reserva_id, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows) !== 2) {
        $conn->rollBack();
        http_response_code(404);
        echo json_encode(['error' => 'Um ou ambos os jogadores não foram encontrados.']);
        exit;
    }

    // (Opcional mas recomendado) — verifica se pertencem ao mesmo time
    if ($rows[0]['codigo_time'] !== $rows[1]['codigo_time']) {
        $conn->rollBack();
        http_response_code(400);
        echo json_encode(['error' => 'Os jogadores não pertencem ao mesmo time.']);
        exit;
    }

    // Define quem vai virar 'T' e quem vai virar 'R'
    // Queremos garantir que, ao final, um seja 'T' e o outro 'R'
    // Simples: seta um para 'T' e o outro para 'R' baseado nos ids recebidos
    $upd = $conn->prepare("UPDATE jogador SET tipo_participacao = :tipo WHERE codigo_jogador = :id");

    // titular_id passa a ser 'R' (reserva) e reserva_id passa a ser 'T' (titular)
    $upd->execute([':tipo' => 'R', ':id' => $titular_id]);
    $upd->execute([':tipo' => 'T', ':id' => $reserva_id]);

    $conn->commit();

    echo json_encode([
        'message' => 'Troca realizada com sucesso.',
        'titular_id' => $reserva_id,
        'reserva_id' => $titular_id
    ]);
    exit;

} catch (Exception $e) {
    if ($conn->inTransaction()) {
        $conn->rollBack();
    }
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao trocar jogadores: ' . $e->getMessage()]);
    exit;
}
