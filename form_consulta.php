<?php
session_start();
require_once 'conexao.php';

// Verifica se todos os parâmetros esperados estão presentes
if (isset($_POST['date'], $_POST['horario'], $_POST['nivel_sintomas'], $_POST['sintomas'], $_POST['outros_sintomas'], $_POST['historia_medica'], $_POST['medicamentos'], $_POST['historico_familiar'], $_POST['estilo_vida'], $_POST['vacinas'])) {
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

    // Verifica se a conexão com o banco de dados foi estabelecida com sucesso
    if ($conn) {
        // Use prepared statements para prevenir SQL injection
        $query = $conn->prepare("INSERT INTO Consulta (data_consulta, horario_consulta, nivel_sintomas, sintomas, outros_sintomas, historia_medica, medicamentos, historico_familiar, estilo_vida, vacinas) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Verifica se a preparação da consulta foi bem-sucedida
        if ($query) {
            // Vincula os parâmetros
            $query->bind_param("ssssssssss", $dataSelecionada, $horarioSelecionado, $nivelSintomas, $sintomas, $outrosSintomas, $historiaMedica, $medicamentos, $historicoFamiliar, $estiloVida, $vacinas);

            // Executa a consulta
            if ($query->execute()) {
                echo 'Dados inseridos com sucesso!';
            } else {
                echo 'Erro na inserção dos dados: ' . $query->error;
            }

            // Fecha a instrução preparada
            $query->close();
        } else {
            echo 'Erro na preparação da consulta.';
        }
    } else {
        echo 'Erro na conexão com o banco de dados.';
    }

    // Fecha a conexão com o banco de dados (se ainda não foi fechada)
    $conexao->close();
} else {
    echo 'Parâmetros POST ausentes ou inválidos.';
}
?>
