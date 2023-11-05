<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <div class="container align-items-center">
    <div class="row justify-content-center">
      <div class="card-login col-md-6 col-lg-4 text-center">
        <div class="card ">
          <div class="card-header">
            Login
          </div>
          <div class="card-body">
            <form action="valida_login.php" method="post">
              <div class="form-group">
                <input name="email" type="email" class="form-control" placeholder="E-mail">
              </div>
              <div class="form-group">
                <input name="senha" type="password" class="form-control" placeholder="Senha">
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

              <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
