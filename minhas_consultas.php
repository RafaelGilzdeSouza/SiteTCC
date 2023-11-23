<?php
require_once 'conexao.php';
require "menu.php";
require_once 'validador_acesso.php';
?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Selecione todos os botões de exclusão
        var btnsExcluir = document.querySelectorAll('.btn-excluir');

        // Adicione um evento de clique a cada botão
        btnsExcluir.forEach(function (btn) {
            btn.addEventListener('click', function (event) {
                // Evite o comportamento padrão do clique (não redirecione imediatamente)
                event.preventDefault();

                // Obtenha o ID da consulta do atributo data-id
                var idConsulta = this.getAttribute('data-id');

                // Exiba o modal de confirmação
                var confirmaExclusao = confirm('Tem certeza que deseja excluir esta consulta?');

                // Se o usuário confirmar a exclusão, crie um formulário e envie-o
                if (confirmaExclusao) {
                    // Crie um formulário dinamicamente
                    var form = document.createElement('form');
                    form.method = 'post';
                    form.action = 'excluir_consulta.php';

                    // Adicione um campo oculto com o ID da consulta
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'id_consulta';
                    input.value = idConsulta;

                    // Adicione o campo ao formulário
                    form.appendChild(input);

                    // Adicione o formulário à página e envie-o
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    });
</script>

<div class="container-lg mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center mb-4"> <!-- Adicionei a classe text-center para centralizar o conteúdo -->
            <h1>Seus Horários Agendados!</h1>
        </div>
    </div>
</div>
<div class="container-lg mt-4">
    <div class="row justify-content-center">

        <?php
        // Verifica se o usuário está conectado
        if (isset($_SESSION['id_usuario'])) {
            $idUsuario = $_SESSION['id_usuario'];
            
            // Verifica se a conexão com o banco de dados foi estabelecida com sucesso
            if ($conn) {
                // Use prepared statements para prevenir SQL injection
                $query = $conn->prepare("SELECT c.*, m.nome AS nome_medico, m.especialidade FROM Consulta c JOIN Medico m ON c.id_medico = m.id WHERE c.id_usuario = ?");

                // Verifica se a preparação da consulta foi bem-sucedida
                if ($query) {
                    // Vincula os parâmetros
                    $query->bind_param("s", $idUsuario);

                    // Executa a consulta
                    if ($query->execute()) {
                        $result = $query->get_result();

                        // Verifica se a consulta retornou algum resultado
                        if ($result->num_rows > 0) {
                            $cardCount = 0; // Contador para controlar o número de cards por linha
                           
                            // Percorre cada linha do resultado
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="col-md-3 mb-3">';
                                echo '<div class="card" style="border-radius: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">Data: ' . $row['data_consulta'] . '</h5>';
                                echo '<h6 class="card-subtitle mb-2 text-muted">Hora: ' . $row['horario_consulta'] . '</h6>';
                                echo '<p class="card-text"><strong>Médico:</strong> ' . $row['nome_medico'] . '</p>';
                                echo '<p class="card-text"><strong>Especialidade:</strong> ' . $row['especialidade'] . '</p>';
                                echo '<p class="card-text"><strong>Sintomas:</strong> ' . $row['sintomas'] . '</p>';
                                
                                // Adiciona o botão de exclusão
                                echo '<form method="post" action="excluir_consulta.php">';
                                echo '<input type="hidden" name="id_consulta" value="' . $row['id'] . '">';
                                echo '<button class="btn btn-danger btn-excluir" data-id="' . $row['id'] . '">Cancelar</button>';
                                echo '</form>';
                                
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
                    echo '<div class="col-md-12">Erro na preparação da consulta.</div>';
                }
            } else {
                echo '<div class="col-md-12">Erro na conexão com o banco de dados.</div>';
            }
        } else {
            echo '<div class="col-md-12">Usuário não conectado.</div>';
        }
        ?>

    </div>
</div>

<?php
require "rodape.php";
?>
