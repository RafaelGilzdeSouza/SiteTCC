<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha o ID da consulta do formulário POST
    $idConsulta = $_POST['id_consulta'];

    // Consulta para obter todos os detalhes da consulta, incluindo o nome do médico e a especialidade
    $sql = "SELECT c.*, m.nome AS nome_medico, m.especialidade FROM Consulta c JOIN Medico m ON c.id_medico = m.id WHERE c.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idConsulta);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $consulta = $result->fetch_assoc();

            // Retorna os detalhes da consulta como JSON
            echo json_encode($consulta);
        } else {
            echo json_encode(['error' => 'Consulta não encontrada']);
        }
    } else {
        echo json_encode(['error' => 'Erro na execução da consulta: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'Método não permitido']);
}
