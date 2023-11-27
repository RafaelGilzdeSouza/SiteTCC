<!DOCTYPE html>
<html>

<head>
<?php require 'header.php';    ?>
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

              
        <a class="nav-link" href="form_cadastro_medico.php">Sou Médico</a>
    
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>