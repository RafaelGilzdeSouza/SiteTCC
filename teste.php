<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <title>Datepicker Bootstrap</title>
</head>
<body>

<div class="container mt-4">
    <form>
        <div class="form-group">
            <label for="datepicker">Selecione uma data:</label>
            <input type="text" class="form-control" id="datepicker" name="datepicker" autocomplete="off">
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script>
    // Inicializar o datepicker
    $(document).ready(function () {
        $('#datepicker').datepicker({
            format: 'dd/mm/yyyy', // Formato da data
            autoclose: true // Fechar automaticamente após a seleção
        });
    });
</script>

</body>
</html>
