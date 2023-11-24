<?php
session_start();
require_once 'conexao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receba os dados do formulário
    $dia = $_POST['dia'];
    $horarios = $_POST['horarios'];

    // Verifique se a conexão com o banco de dados foi estabelecida com sucesso
    if ($conn) {
        // Obter o ID do médico logado
        $idMedico = $_SESSION['id_usuario'];

        // Preparar a consulta para inserir os horários no banco de dados
        $query = $conn->prepare("INSERT INTO HorariosDisponiveis (id_medico, data, horario) VALUES (?, ?, ?)");

        if ($query) {
            // Vincular os parâmetros e executar a consulta para cada horário
            foreach ($horarios as $horario) {
                $dataHorario = date('Y-m-d H:i:s', strtotime("$dia $horario"));
                $query->bind_param("iss", $idMedico, $dataHorario, $horario);
                $query->execute();
            }

            // Fechar a consulta preparada
            $query->close();

            // Redirecionar para a página de sucesso ou outra página desejada
            header('Location: sucesso.php');
            exit();
        } else {
            echo 'Erro na preparação da consulta.';
        }
    } else {
        echo 'Erro na conexão com o banco de dados.';
    }
} else {
    echo 'Método de requisição inválido.';
}
?>
