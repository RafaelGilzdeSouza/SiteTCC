<?php 
session_start();
require 'conexao.php';
include 'menu.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require 'header.php';    ?> 
</head>
<?php

if (isset($_SESSION['mensagem'])) {
    echo '<script>
             window.onload = function() {
                 alert("' . $_SESSION['mensagem'] . '");
             }
         </script>';

    // Limpar a variável de sessão após exibir a mensagem
    unset($_SESSION['mensagem']);
}


?>
<body>
    

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="mb-4">Inserir Horários</h2>

      <!-- Formulário de Inserção -->
      <form action="processar_horarios_atendimento.php" method="post">
        <div class="form-group">
          <label for="data_inicial">Data Inicial:</label>
          <input type="date" class="form-control" id="data_inicial" name="data_inicial" required>
        </div>

        <div class="form-group">
          <label for="horario">Horário:</label>
          <input type="time" class="form-control" id="horario" name="horario" required>
        </div>

        <div class="form-group">
          <label for="quantidade_dias">Quantidade de Dias:</label>
          <input type="number" class="form-control" id="quantidade_dias" name="quantidade_dias" required>
        </div>

        <button type="submit" class="btn btn-primary">Inserir Horários</button>
      </form>
    </div>
  </div>
</div>

<!-- Adicione os scripts do Bootstrap JS e jQuery -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->


</body>
</html>
