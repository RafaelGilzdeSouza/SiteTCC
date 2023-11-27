<?php

session_start();
require_once 'conexao.php';

// Obter os dados do formulário, incluindo a data de nascimento
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

// Adicione a linha abaixo para obter a data de nascimento
$data_nascimento = $_POST['data_nascimento'];

// Verificar se o e-mail já está em uso
$sql_check = "SELECT id FROM usuarios WHERE email = '$email'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    echo "Este endereço de e-mail já está em uso. Por favor, escolha outro.";
} else {
    // O e-mail está disponível, prossiga com o registro
    // Inserir dados na tabela, incluindo a data de nascimento
    $sql_insert = "INSERT INTO usuarios (nome, sobrenome, email, senha, telefone, sexo, endereco, cidade, estado, cep, data_nascimento) 
                   VALUES ('$nome', '$sobrenome', '$email', '$senha', '$telefone', '$sexo', '$endereco', '$cidade', '$estado', '$cep', '$data_nascimento')";

    if ($conn->query($sql_insert) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Erro ao inserir o registro: " . $conn->error;
    }
}

$conn->close();
?>
