<?php

session_start();
require_once 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "SELECT * FROM Login WHERE username = ? AND password = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$usuario_autenticado = false;
$usuario_id = null;
$usuario_perfil_id = null;

foreach ($result as $user) {
    if ($user['username'] == $email && $user['password'] == $senha) {
        $usuario_autenticado = true;
    }
}

if ($usuario_autenticado) {
    $_SESSION['autenticado'] = 'SIM';
    header('Location: home.php');
} else {
    $_SESSION['autenticado'] = 'NÃO';
    header('Location: index.php?login=erro');
}
