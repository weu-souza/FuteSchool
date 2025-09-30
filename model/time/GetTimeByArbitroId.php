<?php
 $path = __DIR__ . '/../bdConfig/bdConfig.php';
    if (!file_exists($path)) {
        die("Arquivo bdConfig.php não encontrado em: $path");
    }
    require_once $path;

function getTimeByUsuarioId($codigo_usuario): array
{
    global $conn;

    $stmt = $conn->prepare("
        SELECT *
        FROM vw_times
        WHERE :codigo_usuario = ANY(usuarios_relacionados)
    ");
    $stmt->bindValue(':codigo_usuario', $codigo_usuario, PDO::PARAM_INT);
    $stmt->execute();

    $times = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $times ?: [];
}
?>