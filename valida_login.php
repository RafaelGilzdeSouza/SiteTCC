<?php

use LDAP\Result;

session_start();
require_once 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$usuario_autenticado = false;
$usuario_id = null;

foreach ($result as $user) {
    if ($user['email'] == $email && $user['senha'] == $senha) {
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
    }
}

if ($usuario_autenticado) {
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['id_usuario'] = $usuario_id;
    header('Location: home.php');
} else {
    $_SESSION['autenticado'] = 'NÃO';
   header('Location: index.php?login=erro');
}
?>