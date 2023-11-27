<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* 100% da altura da visualização (viewport) */
            margin: 0;
        }

        .rodape {
            background-color: #343a40; /* Cor de fundo escura para o rodapé */
            color: white;
            padding: 15px 0; /* Espaçamento interno para o conteúdo do rodapé */
            margin-top: auto; /* Coloca o rodapé no final da página */
        }
    </style>
</head>

<body>
    <!-- Seu conteúdo principal aqui -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Conteúdo da sua página -->
            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <footer class="rodape">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p>Rodapé da Página &copy; <?php echo date("Y"); ?></p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
