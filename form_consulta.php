<?php

require_once 'conexao.php';
require_once 'validador_acesso.php';

// Verifica se todos os parâmetros esperados estão presentes
if (isset($_POST['date'], $_POST['horario'], $_POST['nivel_sintomas'], $_POST['sintomas'], $_POST['outros_sintomas'], $_POST['historia_medica'], $_POST['medicamentos'], $_POST['historico_familiar'], $_POST['estilo_vida'], $_POST['vacinas'], $_POST['id_usuario'], $_POST['id_medico'])) {

    // Obtém os dados da requisição AJAX
    $dataSelecionada = $_POST['date'];
    $horarioSelecionado = $_POST['horario'];
    $nivelSintomas = $_POST['nivel_sintomas'];
    $sintomas = implode(', ', $_POST['sintomas']);
    $outrosSintomas = $_POST['outros_sintomas'];
    $historiaMedica = $_POST['historia_medica'];
    $medicamentos = $_POST['medicamentos'];
    $historicoFamiliar = $_POST['historico_familiar'];
    $estiloVida = $_POST['estilo_vida'];
    $vacinas = $_POST['vacinas'];
    $idUsuario = $_SESSION['id_usuario'];
    $idMedico = $_POST['id_medico'];

    // Verifica se a conexão com o banco de dados foi estabelecida com sucesso
    if ($conn) {
        // Verifica se o horário está disponível
        $verificaHorario = $conn->prepare("SELECT id FROM HorariosDisponiveis WHERE id_medico = ? AND data = ? AND horario = ? AND disponivel = 1");
        $verificaHorario->bind_param("iss", $idMedico, $dataSelecionada, $horarioSelecionado);
        $verificaHorario->execute();
        $verificaHorario->store_result();

        if ($verificaHorario->num_rows > 0) {
            // O horário está disponível, proceda com a inserção
            $query = $conn->prepare("INSERT INTO Consulta (id_usuario, id_medico, data_consulta, horario_consulta, nivel_sintomas, sintomas, outros_sintomas, historia_medica, medicamentos, historico_familiar, estilo_vida, vacinas) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            // Verifica se a preparação da consulta foi bem-sucedida
            if ($query) {
                // Vincula os parâmetros
                $query->bind_param("ssssssssssss", $idUsuario, $idMedico, $dataSelecionada, $horarioSelecionado, $nivelSintomas, $sintomas, $outrosSintomas, $historiaMedica, $medicamentos, $historicoFamiliar, $estiloVida, $vacinas);
                // Executa a consulta
                if ($query->execute()) {
                    $_SESSION['sucesso'] = 'Dados inseridos com sucesso!';
                    header('Location: formulario.php');
                    
                    // Atualiza a disponibilidade do horário para indisponível
                    $atualizaDisponibilidade = $conn->prepare("UPDATE HorariosDisponiveis SET disponivel = 0 WHERE id_medico = ? AND data = ? AND horario = ?");
                    $atualizaDisponibilidade->bind_param("iss", $idMedico, $dataSelecionada, $horarioSelecionado);
                    $atualizaDisponibilidade->execute();
                    $atualizaDisponibilidade->close();
                } else {
                    $_SESSION['sucesso'] = 'Erro na inserção dos dados: ' . $query->error;
                    header('Location: formulario.php');
                }

                // Fecha a instrução preparada
                $query->close();
                header('Location: formulario.php');
            } else {
                $_SESSION['sucesso'] = 'Erro na preparação da consulta.';
                header('Location: formulario.php');
            }
        } else {
            $_SESSION['sucesso'] = 'Horário não disponível.';
            header('Location: formulario.php');
        }

        // Fecha a instrução preparada de verificação de horário
        $verificaHorario->close();
    } else {
        $_SESSION['sucesso'] = 'Erro na conexão com o banco de dados.';
        header('Location: formulario.php');
    }

    // Fecha a conexão com o banco de dados (se ainda não foi fechada)
    $conn->close();
} else {
    $_SESSION['sucesso'] = 'Parâmetros POST ausentes ou inválidos.';
    header('Location: formulario.php');
}

?>
