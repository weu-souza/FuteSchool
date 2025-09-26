  <?php
    $path = __DIR__ . '/../bdConfig/bdConfig.php';
    if (!file_exists($path)) {
        die("Arquivo bdConfig.php não encontrado em: $path");
    }
    require_once $path;

    function getPartidas($codigo_usuario)
    {
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM partidas_view WHERE codigo_arbitro = :codigo_usuario");
        $stmt->bindValue(':codigo_usuario', $codigo_usuario, PDO::PARAM_INT);
        $stmt->execute();

        $partida = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$partida) {
            return null;
        }

        foreach ($partida as &$partidas) {
            $partidas['data_partida'] = (new DateTime($partidas['data_partida']))->format('d/m/Y');
        }

        return $partida;
    }
    ?>