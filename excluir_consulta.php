<?php
require_once 'conexao.php';
require_once 'validador_acesso.php';

// Verifica se o método de requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o ID da consulta foi enviado
    if (isset($_POST['id_consulta'])) {
        $idConsulta = $_POST['id_consulta'];
        
        // Verifica se a conexão com o banco de dados foi estabelecida com sucesso
        if ($conn) {
            // Use prepared statements para prevenir SQL injection
            $query = $conn->prepare("DELETE FROM Consulta WHERE id = ? AND id_usuario = ?");
            
            // Verifica se a preparação da consulta foi bem-sucedida
            if ($query) {
                // Vincula os parâmetros
                $query->bind_param("ss", $idConsulta, $_SESSION['id_usuario']);
                
                // Executa a consulta
                if ($query->execute()) {
                    // A consulta foi excluída com sucesso
                    header('Location: minhas_consultas.php');
                    exit();
                } else {
                    echo 'Erro na exclusão da consulta: ' . $query->error;
                }

                // Fecha a instrução preparada
                $query->close();
            } else {
                echo 'Erro na preparação da consulta.';
            }
        } else {
            echo 'Erro na conexão com o banco de dados.';
        }
    } else {
        echo 'ID da consulta ausente.';
    }
} else {
    echo 'Método de requisição inválido.';
}
?>
