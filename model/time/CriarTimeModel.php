 <?php
    $path = __DIR__ . '/../bdConfig/bdConfig.php';
    if (!file_exists($path)) {
        die("Arquivo bdConfig.php não encontrado em: $path");
    }
    require_once $path;

    function CriarTime($nomeTime, $qtdjogadores, $foto, $codigo_capitao, $codigo_partida): array
{
    global $conn;

    $nomeTime = trim($nomeTime);
    $qtdjogadores = trim($qtdjogadores);
    $foto = is_array($foto) ? ($foto['name'] ?? null) : ($foto ? trim($foto) : null);
    $codigo_capitao = trim($codigo_capitao);
    $codigo_partida = trim($codigo_partida);

    if ($nomeTime === '' || $qtdjogadores === '' || $codigo_capitao === '') {
        return ['sucesso' => false, 'erro' => 'Todos os campos obrigatórios exceto a foto.'];
    }

    // Pega a partida
    $stmt = $conn->prepare("SELECT codigo_time_casa, codigo_time_visitante FROM partida WHERE codigo_partida = :codigo_partida");
    $stmt->bindValue(':codigo_partida', $codigo_partida, PDO::PARAM_INT);
    $stmt->execute();
    $partida = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$partida) {
        return ['sucesso' => false, 'erro' => 'Partida não encontrada.'];
    }

    // Verifica se já existem dois times
    if ($partida['codigo_time_casa'] && $partida['codigo_time_visitante']) {
        return ['sucesso' => false, 'erro' => 'Já existem dois times nessa partida.'];
    }

    // Insere o time
    $stmt = $conn->prepare("INSERT INTO time (codigo_capitao, nome, foto) VALUES (:codigo_capitao, :nome, :foto) RETURNING codigo_time");
    $stmt->bindValue(':codigo_capitao', $codigo_capitao, PDO::PARAM_INT);
    $stmt->bindValue(':nome', $nomeTime, PDO::PARAM_STR);
    $stmt->bindValue(':foto', $foto, PDO::PARAM_STR);
    $stmt->execute();
    $codigo_time = $stmt->fetchColumn();

    // Decide se é time da casa ou visitante
    $campo = $partida['codigo_time_casa'] ? 'codigo_time_visitante' : 'codigo_time_casa';

    // Atualiza a partida
    $stmt = $conn->prepare("UPDATE partida SET $campo = :codigo_time WHERE codigo_partida = :codigo_partida");
    $stmt->bindValue(':codigo_time', $codigo_time, PDO::PARAM_INT);
    $stmt->bindValue(':codigo_partida', $codigo_partida, PDO::PARAM_INT);
    $stmt->execute();

    return ['sucesso' => true, 'codigo_time' => $codigo_time];
}
    ?>