<?php
 $path = __DIR__ . '/../bdConfig/bdConfig.php';
    if (!file_exists($path)) {
        die("Arquivo bdConfig.php não encontrado em: $path");
    }
    require_once $path;

function getTimeByArbitroId($codigo_arbitro): array
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM vw_times WHERE codigo_arbitro = :codigo_arbitro or codigo_capitao = :codigo_capitao");
    $stmt->bindValue(':codigo_arbitro', $codigo_arbitro, PDO::PARAM_INT);
    $stmt->bindValue(':codigo_capitao', $codigo_arbitro, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>