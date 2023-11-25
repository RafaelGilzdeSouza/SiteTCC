<?php
session_start();
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === 'SIM' &&
        isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] === 'medico'
    ) {
        $idMedico = $_SESSION['id_usuario'];

        $diasDaSemana = ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta'];
        $horarios = [];

        foreach ($diasDaSemana as $dia) {
            $campoHorario = 'horario';
            $horario = isset($_POST[$campoHorario]) ? $_POST[$campoHorario] : null;

            // Verificar se o horário é válido (aceitar apenas formato HH:mm)
            if ($horario && preg_match('/^\d{2}:\d{2}$/', $horario)) {
                $horarios[$dia] = $horario;
            } else {
                // Horário inválido, você pode lidar com isso conforme necessário
                echo json_encode(['status' => 'error', 'message' => 'Horário inválido.']);
                exit();
            }
        }

        if ($conn) {
            $query = $conn->prepare("INSERT INTO HorariosDisponiveis (id_medico, data, horario) VALUES (?, ?, ?)");

            if ($query) {
                foreach ($horarios as $dia => $horario) {
                    $dataHorario = date('Y-m-d H:i:s', strtotime("$dia $horario"));
                    $query->bind_param("iss", $idMedico, $dataHorario, $horario);
                    $query->execute();
                }

                $query->close();

                echo json_encode(['status' => 'success']);
                exit();
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Erro na preparação da consulta.']);
                exit();
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Erro na conexão com o banco de dados.']);
            exit();
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Médico não autenticado.']);
        exit();
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método de requisição inválido.']);
    exit();
}
?>
