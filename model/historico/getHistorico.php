  <?php
    $path = __DIR__ . '/../bdConfig/bdConfig.php';
    if (!file_exists($path)) {
        die("Arquivo bdConfig.php não encontrado em: $path");
    }
    require_once $path;

    function getHistorico()
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM vw_historico");
    $stmt->execute();

    $historico = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$historico) {
        return null;
    }

    $resultado = [];

    foreach ($historico as $partida) {
        $codigoPartida = $partida['codigo_partida'];
        $partida['data_partida'] = (new DateTime($partida['data_partida']))->format('d/m/Y');

        // se ainda não existe a partida no array, cria com os dados básicos e um array de times vazio
        if (!isset($resultado[$codigoPartida])) {
            $resultado[$codigoPartida] = [
                'codigo_partida' => $codigoPartida,
                'data_partida'   => $partida['data_partida'],
                'resultado'      => $partida['resultado'], // se quiser mostrar status da partida
                'times'          => []
            ];
        }

        // adiciona os dados do time dentro da partida
        $resultado[$codigoPartida]['times'][] = [
            'codigo_time'         => $partida['codigo_time'],
            'nome'                => $partida['nome'],
            'foto'                => $partida['foto'],
            'quantidade_jogadores'=> $partida['quantidade_jogadores'],
            'gols'                => $partida['gols'],
            'defesas'             => $partida['defesas'],
            'faltas'              => $partida['faltas'],
            'cartoes_amarelos'    => $partida['cartoes_amarelos'],
            'cartoes_vermelhos'   => $partida['cartoes_vermelhos']
        ];
    }

    // retorna array sequencial
    return array_values($resultado);
}
    ?>