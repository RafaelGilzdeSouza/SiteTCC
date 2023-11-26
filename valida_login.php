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
$medico_id = null;

foreach ($resultMedico as $medico) {
        $medico_autenticado = true;
        $medico_id = $medico['id'];
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
    $_SESSION['id_medico'] = $medico_id;
    header('Location: home.php');
} elseif ($usuario_autenticado) {
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['tipo_usuario'] = 'comum';
    $_SESSION['id_usuario'] = $usuario_id;
    header('Location: home.php');
} else {
    $_SESSION['autenticado'] = 'NÃO';
    header('Location: index.php?login=erro');
}
?>



