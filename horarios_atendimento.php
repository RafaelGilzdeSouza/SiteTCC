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
        <!-- horarios_atendimento.php -->

<form method="post" action="processa_cadastro_cronograma.php">
    <label for="dia">Dia da Semana:</label>
    <select name="dia" id="dia">
        <option value="Segunda">Segunda-feira</option>
        <option value="Terca">Terça-feira</option>
        <!-- Adicione opções para os outros dias da semana -->
    </select>

    <label for="horarios">Horários disponíveis:</label>
    <input type="text" name="horarios" placeholder="Informe os horários separados por vírgula">

    <button type="submit">Cadastrar Cronograma</button>
</form>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
