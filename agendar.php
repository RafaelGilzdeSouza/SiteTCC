
<?php
require 'conexao.php';
require 'consulta_agendar.php';
require "menu.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php require 'header.php';   ?> 
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
