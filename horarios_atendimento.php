<!DOCTYPE html>
<html lang="en">

<?php
require "menu.php";

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Horários de Atendimento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>



<body>

    <div class="container mt-5">
        <h2>Cadastro de Horários de Atendimento</h2>
        <form method="POST" action="processa_cadastro_horario.php">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Dia</th>
                        <th>Horário 1</th>
                        <th>Horário 2</th>
                        <th>Horário 3</th>
                        <th>Horário 4</th>
                        <th>Horário 5</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $diasDaSemana = ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta'];

                    foreach ($diasDaSemana as $dia) {
                        echo '<tr>';
                        echo '<td>' . $dia . '</td>';

                        // Exibindo até 5 horários por dia (ajuste conforme necessário)
                        for ($i = 0; $i < 5; $i++) {
                            echo '<td contenteditable="true"></td>';
                        }

                        echo '<td><button type="button" class="btn btn-primary btn-edit" data-dia="' . urlencode($dia) . '">Salvar</button></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Cadastrar Horário</button>
        </form>
    </div>
    <script>
        // Adicionando script JavaScript para processar a edição
        document.addEventListener('DOMContentLoaded', function () {
            var btnsEdit = document.querySelectorAll('.btn-edit');

            btnsEdit.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    // Aqui você pode adicionar lógica para salvar as alterações no banco de dados
                    var dia = btn.getAttribute('data-dia');
                    var horarios = Array.from(btn.parentNode.parentNode.getElementsByTagName('td'))
                        .slice(1, 6) // Pegando os elementos a partir do segundo td
                        .map(td => td.innerText);

                    // Exemplo de envio dos dados para o servidor usando fetch ou outro método
                    fetch('processa_cadastro_horario.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            dia: dia,
                            horarios: horarios,
                        }),
                    })
                        .then(response => response.json())
                        .then(data => {
                            // Aqui você pode lidar com a resposta do servidor
                            console.log(data);
                        })
                        .catch((error) => {
                            console.error('Error:', error);
                        });
                });
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
