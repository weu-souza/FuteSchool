<?php
session_start();

// Limpa o array da sessão
$_SESSION = [];

// Mata o cookie da sessão
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroi a sessão
session_destroy();

// Redireciona pra página inicial
header('Location: /');
exit;
