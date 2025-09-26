  <?php
    $path = __DIR__ . '/../bdConfig/bdConfig.php';
    if (!file_exists($path)) {
        die("Arquivo bdConfig.php não encontrado em: $path");
    }
    require_once $path;

    function login($email, $senha)
    {
        global $conn;

        $stmt = $conn->prepare("SELECT email, senha, tipo_usuario, nome FROM usuario WHERE email = :email LIMIT 1");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return false;
        }

        if ($senha !== $user['senha']) {
            return false;
        }
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION['tipo_usuario'] = $user['tipo_usuario'];
        $_SESSION['nome'] = $user['nome'];

        return true;
    }
    ?>