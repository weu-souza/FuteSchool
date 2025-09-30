<?php
 $path = __DIR__ . '/../bdConfig/bdConfig.php';
    if (!file_exists($path)) {
        die("Arquivo bdConfig.php não encontrado em: $path");
    }
    require_once $path;

function getCardTimeById($codigo_time): array
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM vw_time_card WHERE codigo_time = :codigo_time");
    $stmt->bindValue(':codigo_time', $codigo_time, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getJogadorTimeById($codigo_time): array
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM vw_time_jogadores WHERE codigo_time = :codigo_time");
    $stmt->bindValue(':codigo_time', $codigo_time, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getGolsTimeById($codigo_time): array
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM vw_gols WHERE codigo_time = :codigo_time");
    $stmt->bindValue(':codigo_time', $codigo_time, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>