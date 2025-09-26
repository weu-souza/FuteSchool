 <?php
    $path = __DIR__ . '/../bdConfig/bdConfig.php';
    if (!file_exists($path)) {
        die("Arquivo bdConfig.php não encontrado em: $path");
    }
    require_once $path;
    function InscreverJogador($codigo_usuario, $nmrCamisa, $posicaoTime, $funcaoTime, $codigo_time, $codigo_partida)
    {
        global $conn;

        if (!$conn) {
            return ['sucesso' => false, 'erro' => 'Erro ao conectar ao banco de dados.'];
        }

        try {
            // Validação mínima
            if (!$codigo_usuario || !$codigo_time || !$nmrCamisa || !$posicaoTime || !$funcaoTime) {
                return ['sucesso' => false, 'erro' => 'Todos os campos são obrigatórios.'];
            }

            // Insere o jogador
            $sql = "INSERT INTO jogador 
                (codigo_usuario, codigo_time, numero_camisa, posicao_time, tipo_participacao)
                VALUES
                (:codigo_usuario, :codigo_time, :numero_camisa, :posicao_time, :tipo_participacao)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':codigo_usuario', $codigo_usuario, PDO::PARAM_INT);
            $stmt->bindValue(':codigo_time', $codigo_time, PDO::PARAM_INT);
            $stmt->bindValue(':numero_camisa', $nmrCamisa, PDO::PARAM_INT);
            $stmt->bindValue(':posicao_time', $posicaoTime, PDO::PARAM_STR);
            $stmt->bindValue(':tipo_participacao', $funcaoTime, PDO::PARAM_STR);

            $stmt->execute();
            return ['sucesso' => true];
        } catch (PDOException $e) {
            return ['sucesso' => false, 'erro' => 'Erro ao inscrever jogador: ' . $e->getMessage()];
        }
    }
