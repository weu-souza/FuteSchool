<?php
 $path = __DIR__ . '/../bdConfig/bdConfig.php';
    if (!file_exists($path)) {
        die("Arquivo bdConfig.php não encontrado em: $path");
    }
    require_once $path;

   function getPartidaById($codigo_partida) {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM partidas_view WHERE codigo_partida = :codigo_partida");
    $stmt->bindValue(':codigo_partida', $codigo_partida, PDO::PARAM_INT);
    $stmt->execute();

    $partida = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$partida) {
        return null;
    }


    $partida['data_partida'] = (new DateTime($partida['data_partida']))->format('d/m/Y');

    return $partida;
}

function getTempoPartidaByPartidaId($codigo_partida){
     global $conn;

    $stmt = $conn->prepare("SELECT * FROM partida WHERE codigo_partida = :codigo_partida");
    $stmt->bindValue(':codigo_partida', $codigo_partida, PDO::PARAM_INT);
    $stmt->execute();

    $partida = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$partida) {
        return null;
    }


    $partida['data_partida'] = (new DateTime($partida['data_partida']))->format('d/m/Y');

    return $partida;
}

   function getTimeByPartidaId($codigo_time,$codigo_partida) {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM vw_time_jogadores WHERE codigo_partida = :codigo_partida and codigo_time = :codigo_time");
    $stmt->bindValue(':codigo_partida', $codigo_partida, PDO::PARAM_INT);
    $stmt->bindValue(':codigo_time', $codigo_time, PDO::PARAM_INT);
    $stmt->execute();

    $time = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$time) {
        return null;
    }

    return $time;
}
