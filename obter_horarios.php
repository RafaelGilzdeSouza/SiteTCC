<?php
require 'conexao.php';
header('Content-Type: application/json');

// Obter a data do parâmetro POST
$data = $_POST['data'];
error_log("Data Recebida: " . $data); // Adicione este log

// Obter os horários disponíveis para a data específica
$sql = "SELECT horario FROM HorariosDisponiveis WHERE id_medico = ? AND data = ?";
$stmt = $conn->prepare($sql);

$id_medico = 1; // Substitua pelo ID real do médico
$stmt->bind_param("is", $id_medico, $data);

$stmt->execute();
$stmt->store_result();
$stmt->bind_result($horario);

$horarios_disponiveis = array();

while ($stmt->fetch()) {
    $horarios_disponiveis[] = $horario;
}

echo json_encode($horarios_disponiveis);

$stmt->close();
$conn->close();
?>