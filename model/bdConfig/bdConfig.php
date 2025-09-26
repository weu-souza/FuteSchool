<?php

$host = "localhost"; 
$port = "5432";        
$dbname = "Futeschool"; 
$user = "postgres"; 
$password = "1234"; 

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    // Ativa erros do PDO em forma de exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexão estabelecida com sucesso 🖤";
} catch (PDOException $e) {
    die("Erro na conexão com o banco: " . $e->getMessage());
}
?>
