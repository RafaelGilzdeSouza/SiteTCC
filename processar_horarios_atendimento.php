<?php

include 'conexao.php';

// Iniciar a sessão
session_start();

// Obtém o ID do médico da sessão
$id_medico = $_SESSION['id_medico'];

// Obtém os dados do formulário
$data_inicial = $_POST['data_inicial'];
$horario = $_POST['horario'];
$quantidade_dias = $_POST['quantidade_dias'];

// Cria a função para inserir horários
function inserirHorarios($conn, $id_medico, $data_inicial, $horario, $quantidade_dias) {
    $n = 0;

    while ($n < $quantidade_dias) {
        // Verifica se já existe um horário para o médico na data específica
        $checkQuery = "SELECT 1 FROM HorariosDisponiveis hd WHERE hd.id_medico = $id_medico AND hd.data = DATE_ADD('$data_inicial', INTERVAL $n DAY) AND hd.horario = '$horario'";
        $result = $conn->query($checkQuery);

        if ($result->num_rows === 0) {
            // Se não existir, então podemos inserir
            $insertQuery = "INSERT INTO HorariosDisponiveis (id_medico, data, horario) VALUES ($id_medico, DATE_ADD('$data_inicial', INTERVAL $n DAY), '$horario')";
            $conn->query($insertQuery);
        }

        $n++;
    }
}

// Chama a função para inserir os horários
inserirHorarios($conn, $id_medico, $data_inicial, $horario, $quantidade_dias);
$_SESSION['mensagem'] = 'Horários cadastrados com sucesso!';

// Fecha a conexão
$conn->close();

// Redireciona de volta para a página inicial ou outra página desejada
header("Location: horarios_atendimento.php");
exit();
?>
