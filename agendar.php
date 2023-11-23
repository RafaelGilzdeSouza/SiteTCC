
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
</body>
</html>
