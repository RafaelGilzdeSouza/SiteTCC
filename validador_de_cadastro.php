<?php

session_start();
require_once 'conexao.php';

// Obter os dados do formulário
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$sexo = $_POST['sexo'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];


// Inserir dados na tabela
$sql = "INSERT INTO usuarios (nome, sobrenome, email, senha, telefone, sexo, endereco, cidade, estado, cep) VALUES ('$nome', '$sobrenome', '$email', '$senha','$telefone', '$sexo', '$endereco', '$cidade', '$estado', '$cep')";

if ($conn->query($sql) === TRUE) {
    echo "Registro inserido com sucesso.";
} else {
    echo "Erro ao inserir o registro: " . $conn->error;
}

$conn->close();
?>