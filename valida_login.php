<?php
session_start();
require_once 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

// Verificar se é um médico
$queryMedico = "SELECT id FROM Medico WHERE email = ? AND senha = ?";
$stmtMedico = mysqli_prepare($conn, $queryMedico);
mysqli_stmt_bind_param($stmtMedico, "ss", $email, $senha);
mysqli_stmt_execute($stmtMedico);
$resultMedico = mysqli_stmt_get_result($stmtMedico);

$medico_autenticado = false;
$id_medico= null;

foreach ($resultMedico as $medico) {
        $medico_autenticado = true;
        $id_medico = $medico['id'];
}

// Verificar se é um usuário comum
$queryUsuario = "SELECT id FROM usuarios WHERE email = ? AND senha = ?";
$stmtUsuario = mysqli_prepare($conn, $queryUsuario);
mysqli_stmt_bind_param($stmtUsuario, "ss", $email, $senha);
mysqli_stmt_execute($stmtUsuario);
$resultUsuario = mysqli_stmt_get_result($stmtUsuario);

$usuario_autenticado = false;
$usuario_id = null;

foreach ($resultUsuario as $user) {
    $usuario_autenticado = true;
    $usuario_id = $user['id'];
}

if ($medico_autenticado) {
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['tipo_usuario'] = 'medico';
    $_SESSION['id_medico'] = $id_medico; 
     // <-- Verifique se é isso que você deseja
    $_SESSION['nome_usuario'] = obterNomeMedico($id_medico);
    header('Location: home.php');
} elseif ($usuario_autenticado) {
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['tipo_usuario'] = 'comum';
    $_SESSION['id_usuario'] = $usuario_id;
    $_SESSION['nome_usuario'] = obterNomeUsuario($usuario_id);
    header('Location: home.php');
} else {
    $_SESSION['autenticado'] = 'NÃO';
    header('Location: index.php?login=erro');
}
// Função para obter o nome do médico
function obterNomeMedico($id) {
    global $conn;

    $query = "SELECT nome, sobrenome FROM Medico WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['nome'] . ' ' . $row['sobrenome'];
    } else {
        return "Médico não encontrado";
    }
}

// Função para obter o nome do usuário comum
function obterNomeUsuario($id) {
    global $conn;

    $query = "SELECT nome, sobrenome FROM usuarios WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['nome'] . ' ' . $row['sobrenome'];
    } else {
        return "Usuário comum não encontrado";
    }
}
?>



