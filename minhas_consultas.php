<?php
require_once 'conexao.php';
require "menu.php";
require_once 'validador_acesso.php';
?>

<div class="container-lg mt-4"> <!-- Substituído container por container-lg para um contêiner mais amplo -->
    <div class="row justify-content-center mx-n3">

        <?php
        // Verifica se o usuário está conectado
        if (isset($_SESSION['id_usuario'])) {
            $idUsuario = $_SESSION['id_usuario'];

            // Verifica se a conexão com o banco de dados foi estabelecida com sucesso
            if ($conn) {
                // Use prepared statements para prevenir SQL injection
                $query = $conn->prepare("SELECT * FROM Consulta WHERE id_usuario = ?");

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
                                echo '<div class="card" style="width: 18rem; border-radius: 15px;">';
                                echo '<div class="card-body">';
                                echo '<p>Data: </p><h5 class="card-title">' . $row['data_consulta'] . '</h5>';
                                echo '<p>Hora: <h6 class="card-subtitle mb-2 text-muted">' . $row['horario_consulta'] . '</h6>';
                                echo '<p class="card-text">' . $row['nivel_sintomas'] . '</p>';
                                echo '<p class="card-text">' . $row['sintomas'] . '</p>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';

                                $cardCount++;

                                // Abre uma nova linha a cada 5 cards
                                if ($cardCount % 5 === 0) {
                                    echo '</div><div class="row justify-content-center mx-n3 mt-3">';
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
