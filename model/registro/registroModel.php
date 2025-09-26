  <?php
    $path = __DIR__ . '/../bdConfig/bdConfig.php';
    if (!file_exists($path)) {
        die("Arquivo bdConfig.php não encontrado em: $path");
    }
    require_once $path;

    function registro(string $email, string $senha, string $nome): array
    {
        global $conn;

        $email = trim($email);
        $nome  = trim($nome);
        if ($email === '' || $senha === '' || $nome === '') {
            return ['sucesso' => false, 'erro' => 'Todos os campos são obrigatórios.'];
        }

        try {
            // verifica se email já existe
            $check = $conn->prepare("SELECT codigo_usuario FROM usuario WHERE email = :email LIMIT 1");
            $check->bindValue(':email', $email, PDO::PARAM_STR);
            $check->execute();

            if ($check->fetch(PDO::FETCH_ASSOC)) {
                return ['sucesso' => false, 'erro' => 'E-mail já cadastrado.'];
            }

            // insere novo usuário
            $ins = $conn->prepare("
            INSERT INTO usuario (email, senha, nome)
            VALUES (:email, :senha, :nome)
        ");
            $ins->bindValue(':email', $email, PDO::PARAM_STR);
            $ins->bindValue(':senha', $senha, PDO::PARAM_STR);
            $ins->bindValue(':nome', $nome, PDO::PARAM_STR);
            $ins->execute();

            return ['sucesso' => true];
        } catch (PDOException $e) {
            return ['sucesso' => false, 'erro' => 'Erro no banco: ' . $e->getMessage()];
        }
    }
    ?>