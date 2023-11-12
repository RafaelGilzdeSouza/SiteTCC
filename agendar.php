
<?php
require "menu.php";
require 'consulta_agendar.php';
require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Lista de Médicos</title>
</head>
<body>

<div class="container mt-4">
    <div class="row">
    <?php
    $consultaAgendar = new ConsultaAgendar($conn);
    $consultaAgendar->renderCards();
    ?>
  </div>
</div>

<?php require "rodape.php";?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
