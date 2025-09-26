  <?php
    $path = __DIR__ . '/../bdConfig/bdConfig.php';
    if (!file_exists($path)) {
        die("Arquivo bdConfig.php não encontrado em: $path");
    }
    require_once $path;

    function CriarPartida($nomeCompeticao, $dataInicio, $dataFim, $tipo_partida, $qtdTime, $tempo, $codigo_arbitro): array
    {
        global $conn;

        $nomeCompeticao = trim($nomeCompeticao);
        $dataInicio     = trim($dataInicio);
        $dataFim        = trim($dataFim);
        $tipo_partida   = trim($tipo_partida);
        $qtdTime        = trim($qtdTime);
        $tempo          = trim($tempo);
        $codigo_arbitro = (int) $codigo_arbitro;

        if ($nomeCompeticao === '' || $dataInicio === '' || $dataFim === '' || $tipo_partida === '' || $tempo === '' || $codigo_arbitro === 0) {
            return ['sucesso' => false, 'erro' => 'Todos os campos são obrigatórios.'];
        }

        try {
            // cria competição
            $stmt = $conn->prepare("
            INSERT INTO competicao (nome_competicao, data_inicio, data_fim, tipo_competicao)
            VALUES (:nome, :inicio, :fim, :tipo)
        ");
            $stmt->bindValue(':nome', $nomeCompeticao);
            $stmt->bindValue(':inicio', $dataInicio);
            $stmt->bindValue(':fim', $dataFim);
            $stmt->bindValue(':tipo', $tipo_partida);
            $stmt->execute();

            $codigo_competicao = $conn->lastInsertId();

            // cria partida vinculada
            $stmt2 = $conn->prepare("
            INSERT INTO partida (codigo_competicao, codigo_arbitro, codigo_time_casa, codigo_time_visitante, codigo_time_vencedor, data_partida, tempo_partida, partida_finalizada)
            VALUES (:comp, :arbitro, NULL, NULL, NULL, :data_partida, :tempo, FALSE)
        ");
            $stmt2->bindValue(':comp', $codigo_competicao);
            $stmt2->bindValue(':arbitro', $codigo_arbitro);
            $stmt2->bindValue(':data_partida', $dataInicio); // exemplo: primeira partida no dia de início
            $stmt2->bindValue(':tempo', $tempo);
            $stmt2->execute();

            return ['sucesso' => true, 'codigo_competicao' => $codigo_competicao];
        } catch (PDOException $e) {
            return ['sucesso' => false, 'erro' => 'Erro no banco criar partida: ' . $e->getMessage()];
        }
    }
    ?>