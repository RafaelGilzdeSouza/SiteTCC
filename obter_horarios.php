<?php
require 'conexao.php';
header('Content-Type: application/json');

// Obter a data e o id_medico do parâmetro POST
$data = $_POST['data'];
$id_medico = isset($_POST['id_medico']) ? $_POST['id_medico'] : null;

// Verificar se a data e o id_medico foram fornecidos
if ($data && $id_medico !== null) {
    // Obter os horários disponíveis para a data específica
    $sql = "SELECT horario FROM HorariosDisponiveis WHERE id_medico = ? AND data = ? AND disponivel = 1";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("is", $id_medico, $data);

    // Executar a consulta
    if ($stmt->execute()) {
        $stmt->store_result();
        $stmt->bind_result($horario);

        $horarios_disponiveis = array();

        while ($stmt->fetch()) {
            $horarios_disponiveis[] = $horario;
        }

        echo json_encode($horarios_disponiveis);
    } else {
        // Se houver um erro na execução da consulta
        echo json_encode(array('erro' => 'Erro ao executar a consulta.'));
    }

    // Fechar a instrução preparada
    $stmt->close();
} else {
    // Se a data ou o id_medico não foram fornecidos
    echo json_encode(array('erro' => 'Parâmetros ausentes ou inválidos.'));
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
