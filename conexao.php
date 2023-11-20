<?php
$hostname = "localhost:3307"; // nome do servidor (geralmente "localhost" localmente)
$username = "root"; // nome de usuário do banco de dados
$password = "root"; // senha do banco de dados
$database = "webhealth"; // nome do banco de dados

// Criar conexão
$conn = new mysqli($hostname, $username, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>