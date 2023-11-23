<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupere os dados do formulário
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $dataNascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $crm = $_POST['crm'];
    $especialidade = $_POST['especialidade'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $imgUrl = 'img/profile' . $_FILES['imagem']['name'];

    // Verifique se a conexão com o banco de dados foi estabelecida com sucesso
    if ($conn) {

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $tempName = $_FILES['imagem']['tmp_name'];
            $imgPath = 'img/profile/' . basename($_FILES['imagem']['name']);
            
            // Move o arquivo carregado para o destino desejado
            move_uploaded_file($tempName, $imgPath);
        
            // Atualize $imgUrl com o caminho correto
            $imgUrl = $imgPath;
        } else {
            // Defina um valor padrão se nenhum arquivo de imagem for enviado
            $imgUrl = 'img/profile/medico.jpg';
        }

        // Use prepared statements para prevenir SQL injection
        $query = $conn->prepare("INSERT INTO Medico (nome, sobrenome, data_nascimento, sexo, email, telefone, CRM, especialidade, endereco, cidade, estado, cep, img_data) 
                                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Verifique se a preparação da consulta foi bem-sucedida
        if ($query) {
            // Vincule os parâmetros
            $query->bind_param("sssssssssssss", $nome, $sobrenome, $dataNascimento, $sexo, $email, $telefone, $crm, $especialidade, $endereco, $cidade, $estado, $cep, $imgUrl);

            // Execute a consulta
            if ($query->execute()) {
                // Mova o arquivo de upload para o diretório desejado
                move_uploaded_file($_FILES['imagem']['tmp_name'], 'img/profile/' . $_FILES['imagem']['name']);

                // Redirecione para a página de sucesso ou outra página desejada
                header('Location: home.php');
                exit();
            } else {
                echo 'Erro na execução da consulta: ' . $query->error;
            }

            // Feche a instrução preparada
            $query->close();
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
