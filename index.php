<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
    <style>
        body {
            background-color: #f5f5f5;
        }

        .login-container {
            margin-top: 100px;
        }

        .card-login {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 50px;
        }

        .card-login .card-header {
            background-color: #f0f0f0;
            border-bottom: none;
            text-align: center;
            padding: 20px 0;
        }

        .card-login h3 {
            color: #333;
        }

        .card-login .card-body {
            padding: 20px;
        }

        .card-login .form-group {
            margin-bottom: 20px;
        }

        .card-login a {
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center login-container">
        <div class="col-md-6 col-lg-4">
            <div class="card card-login">
                <div class="card-header">
                <img style="width: 70px;" src="img/logo.png" alt="">
                   <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form action="valida_login.php" method="post">
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="E-mail" required>
                        </div>
                        <div class="form-group">
                            <input name="senha" type="password" class="form-control" placeholder="Senha" required>
                        </div>
                        <a href="cadastro_usuario.php">Ainda não é cadastrado?</a>

                        <?php if (isset($_GET['login']) && $_GET['login'] == 'erro') { ?>
                            <div class="text-danger">
                                Usuário ou senha inválido(s)
                            </div>
                        <?php } ?>
                        <?php if (isset($_GET['login']) && $_GET['login'] == 'erro2') { ?>
                            <div class="text-danger">
                                Por favor, faça login antes de acessar as páginas protegidas
                            </div>
                        <?php } ?>

                        <button class="btn btn-info btn-block" type="submit">Entrar</button>

                        <a class="nav-link" href="form_cadastro_medico.php">Sou Médico</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
