<!DOCTYPE html>
<html>



<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a style="display: flex; align-items: center;" class=" navbar-brand" href="home.php">
      <img style="width: 40px;" src="img/logo.png" alt="">
      <h1 style=' font-size: 23px; margin-top: 5px;'>Web health</h1>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="agendar.php">Agendar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="minhas_consultas.php">Minhas Consultas</a>
        </li>

        <?php
        // Verifica se o usuário está logado e é do tipo "medico"
        if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] === 'medico') {
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="horarios_atendimento.php">Meu Horário de Atendimento</a>';
          echo '</li>';
        }
        ?>
      </ul>

      <ul class="navbar-nav ml-auto">
        <?php


        if (isset($_SESSION['nome_usuario'])) {
          echo '<li class="nav-item">';
          echo '<span class="navbar-text mr-3">Bem-vindo, ' . $_SESSION['nome_usuario'] . '!</span>';
          echo '</li>';
        }
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Logoff
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="logoff.php">Sair</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>


</body>

</html>