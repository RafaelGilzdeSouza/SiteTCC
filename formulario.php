<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <title>Perfil do Médico</title>
</head>
<body>

<?php
require "menu.php";

// Verificar se as chaves existem no array $_GET
$nome = isset($_GET['nome']) ? urldecode($_GET['nome']) : '';
$especialidade = isset($_GET['especialidade']) ? urldecode($_GET['especialidade']) : '';
$email = isset($_GET['email']) ? urldecode($_GET['email']) : '';
$img_url = isset($_GET['img_url']) ? urldecode($_GET['img_url']) : '';
$endereco = isset($_GET['endereco']) ? urldecode($_GET['endereco']) : '';
$telefone = isset($_GET['tell']) ? urldecode($_GET['tell']) : '';
$crm = isset($_GET['crm']) ? urldecode($_GET['crm']) : '';
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <!-- Imagem à esquerda do texto -->
            <img src="img/medico.jpg" alt="Imagem do Médico" style="width: 100%; max-width: 300px;">
        </div>
        <div class="col-md-6">
            <!-- Texto à direita da imagem -->
            <h5><?= $nome ?></h5>
            <p>Especialidade: <?= $especialidade ?></p>
            <p>Email: <?= $email ?></p>
            <p>Endereço: <?= $endereco ?></p>
            <p>Fone: <?= $telefone ?></p>
            <p>CRM: <?= $crm ?></p>
        </div>
    </div>

    <!-- Adicione a seção do datepicker fora do card -->
    <div class="mt-4">
        <h5>Agendar Consulta</h5>
        <form>
            <div class="form-group">
                <label for="datepicker">Selecione uma data:</label>
                <input type="text" class="form-control" id="datepicker" name="datepicker" autocomplete="off">
            </div>
        </form>
        <!-- Container para mostrar os horários disponíveis -->
        <div id="horarios-disponiveis"></div>
    </div>

    <script>
       $(document).ready(function () {
    $('#datepicker').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true,
        todayHighlight: true,
        startDate: new Date()
    });

    $('#datepicker').on('changeDate', function (e) {
        var dataSelecionada = $('#datepicker').val();
        console.log('Data Selecionada:', dataSelecionada);

        $.ajax({
            type: "POST",
            url: "obter_horarios.php",
            data: { data: dataSelecionada },
            dataType: 'json',
            success: function (response) {
                console.log('Resposta da AJAX:', response);
                $('#horarios-disponiveis').html('<h6>Horários Disponíveis:</h6><p>' + response.join('</p><p>') + '</p>');
            },
            error: function (xhr, status, error) {
                console.error('Erro na AJAX:', error);
            }
        });
    });
});
    </script>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</body>
</html>
