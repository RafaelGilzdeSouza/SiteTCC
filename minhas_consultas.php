<?php
require_once 'conexao.php';
require_once 'validador_acesso.php';
require "menu.php";

function calcularIdade($dataNascimento)
{
    $dataAtual = new DateTime();
    $dataNascimento = new DateTime($dataNascimento);
    $idade = $dataAtual->diff($dataNascimento);
    return $idade->y;
}

?>
<head>
<?php require 'header.php';    ?> 
</head>
<div class="container-lg mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center mb-4">
            <h1>Seus Horários Agendados!</h1>
        </div>
    </div>
</div>
<div class="container-lg mt-4">
    <div class="row justify-content-center">

        <!-- Adicione um novo modal para exibir detalhes da consulta -->
        <div class="modal fade" id="detalhesModal" tabindex="-1" role="dialog" aria-labelledby="detalhesModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detalhesModalLabel">Detalhes da Consulta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Aqui serão exibidas as informações detalhadas da consulta -->
                        <div id="detalhesConsulta"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // Verifica se há um usuário conectado
        if (isset($_SESSION['id_usuario']) || isset($_SESSION['tipo_usuario'])) {
            // Se for um médico, usa o ID do médico; caso contrário, usa o ID do usuário regular
            $idUsuario = isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] === 'medico' ? $_SESSION['id_medico'] : $_SESSION['id_usuario'];
           
            // Verifica se a conexão com o banco de dados foi estabelecida com sucesso
            if ($conn) {
                // Use prepared statements para prevenir SQL injection
                if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] === 'medico') {
                    // O usuário é um médico
                    $query = $conn->prepare("SELECT c.*, u.nome AS nome_paciente, u.data_nascimento, m.nome AS nome_medico, m.especialidade 
                                            FROM Consulta c 
                                            JOIN Medico m ON c.id_medico = m.id 
                                            JOIN usuarios u ON c.id_usuario = u.id 
                                            WHERE c.id_medico = ?");
                    $query->bind_param("s", $idUsuario);
                } else {
                    // O usuário é um paciente
                    $query = $conn->prepare("SELECT c.*, m.nome AS nome_medico, m.especialidade 
                                            FROM Consulta c 
                                            JOIN Medico m ON c.id_medico = m.id 
                                            WHERE c.id_usuario = ?");
                    $query->bind_param("s", $idUsuario);
                }

                // Executa a consulta
                if ($query->execute()) {
                    $result = $query->get_result();

                    // Verifica se a consulta retornou algum resultado
                    if ($result->num_rows > 0) {
                        $cardCount = 0; // Contador para controlar o número de cards por linha

                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-md-3 mb-3">';
                            echo '<div class="card " style="border-radius: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">Data: ' . $row['data_consulta'] . '</h5>';
                            echo '<h6 class="card-subtitle mb-2 text-muted">Hora: ' . $row['horario_consulta'] . '</h6>';

                            if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] === 'medico') {
                                // Se o usuário logado for um médico, substitui o nome do médico e a especialidade pelo nome do paciente e a idade
                                echo '<p class="card-text"><strong>Paciente:</strong> ' . $row['nome_paciente'] . '</p>';
                                echo '<p class="card-text"><strong>Idade:</strong> ' . calcularIdade($row['data_nascimento']) . ' anos</p>';
                            } else {
                                // Se o usuário logado não for um médico, exibe o nome do médico e a especialidade
                                echo '<p class="card-text"><strong>Médico:</strong> ' . $row['nome_medico'] . '</p>';
                                echo '<p class="card-text"><strong>Especialidade:</strong> ' . $row['especialidade'] . '</p>';
                            }

                            echo '<p class="card-text"><strong>Sintomas:</strong> ' . $row['sintomas'] . '</p>';

                            // Adiciona os botões em um grupo
                            echo '<div class="btn-group" role="group">';

                            // Adiciona o botão de detalhes
                            if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] === 'medico') {
                                // Se o usuário logado for um médico, substitui o nome do médico e a especialidade pelo nome do paciente e a idade
                                echo '<button class="btn btn-info btn-detalhes mr-2" data-id="' . $row['id'] . '">Detalhes</button>';
                            } else {
                                // Se o usuário logado não for um médico, mantém o botão de detalhes com as informações do médico
                                echo '<button class="btn btn-info btn-detalhes mr-2" data-id="' . $row['id'] . '">Detalhes</button>';
                            }

                            // Verifica se o usuário conectado é um médico
                            if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] === 'medico') {
                                // Se for um médico, substitui o botão "Cancelar" por "Receita"
                                echo '<form method="post" action="gerar_receita.php">';
                                echo '<input type="hidden" name="id_consulta" value="' . $row['id'] . '">';
                            
                                echo '</form>';
                            } else {
                                // Se não for um médico, exibe o botão "Cancelar"
                                echo '<form method="post" action="excluir_consulta.php">';
                                echo '<input type="hidden" name="id_consulta" value="' . $row['id'] . '">';
                                echo '<button class="btn btn-danger btn-excluir" data-id="' . $row['id'] . '">Cancelar</button>';
                                echo '</form>';
                            }

                            echo '</div>'; // Fecha o grupo de botões
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';

                            $cardCount++;

                            // Abre uma nova linha a cada 4 cards
                            if ($cardCount % 4 === 0) {
                                echo '</div><div class="row justify-content-center">';
                            }
                        }
                    } else {
                        echo '<div class="col-md-12">Nenhuma consulta encontrada para este usuário.</div>';
                    }
                } else {
                    echo '<div class="col-md-12">Erro na execução da consulta: ' . $query->error . '</div>';
                }

                // Fecha a instrução preparada
                $query->close();
            } else {
                echo '<div class="col-md-12">Erro na conexão com o banco de dados.</div>';
            }
        } else {
            echo '<div class="col-md-12">Usuário não conectado.</div>';
        }
        ?>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Selecione todos os botões de detalhes
        var btnsDetalhes = document.querySelectorAll('.btn-detalhes');

        // Adicione um evento de clique a cada botão
        btnsDetalhes.forEach(function(btn) {
            btn.addEventListener('click', function(event) {
                // Evite o comportamento padrão do clique (não redirecione imediatamente)
                event.preventDefault();

                // Obtenha o ID da consulta do atributo data-id
                var idConsulta = this.getAttribute('data-id');

                // Faça uma solicitação AJAX para obter todos os detalhes da consulta
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'obter_detalhes_consulta.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                // ...

                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);

                        console.log(response); // Adicione esta linha para verificar os dados no console

                        if (!response.error) {
                            // Atualize o conteúdo do modal com os detalhes da consulta
                            var modalContent = '<p><strong>Data:</strong> ' + response.data_consulta + '</p>' +
                                '<p><strong>Hora:</strong> ' + response.horario_consulta + '</p>' +
                                '<p><strong>Nível de Sintomas:</strong> ' + response.nivel_sintomas + '</p>' +
                                '<p><strong>Sintomas:</strong> ' + response.sintomas + '</p>' +
                                '<p><strong>Outros Sintomas:</strong> ' + response.outros_sintomas + '</p>' +
                                '<p><strong>História Médica:</strong> ' + response.historia_medica + '</p>' +
                                '<p><strong>Medicamentos:</strong> ' + response.medicamentos + '</p>' +
                                '<p><strong>Histórico Familiar:</strong> ' + response.historico_familiar + '</p>' +
                                '<p><strong>Estilo de Vida:</strong> ' + response.estilo_vida + '</p>' +
                                '<p><strong>Vacinas:</strong> ' + response.vacinas + '</p>';

                            // Verifique se as propriedades existem antes de usá-las
                            if (response.nome_paciente !== undefined && response.idade_paciente !== undefined) {
                                if (response.nome_medico !== undefined && response.especialidade !== undefined) {
                                    // Se o usuário é um médico, substitua as informações do médico pelas do paciente
                                    modalContent = modalContent.replace('<p><strong>Médico:</strong> ' + response.nome_medico + '</p>', '');
                                    modalContent = modalContent.replace('<p><strong>Especialidade:</strong> ' + response.especialidade + '</p>', '');
                                }

                                modalContent += '<p><strong>Paciente:</strong> ' + response.nome_paciente + '</p>' +
                                    '<p><strong>Idade:</strong> ' + response.idade_paciente + ' anos</p>';
                            }

                            // Exiba o modal
                            $('#detalhesConsulta').html(modalContent);
                            $('#detalhesModal').modal('show');
                        } else {
                            alert('Erro ao obter detalhes da consulta: ' + response.error);
                        }
                    }
                };

                // ...


                // Envie a solicitação com o ID da consulta
                xhr.send('id_consulta=' + idConsulta);
            });
        });
    });
</script>

<?php
require "rodape.php";
?>