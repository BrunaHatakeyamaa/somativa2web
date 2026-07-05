<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ALOA</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Ledger&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style/nav.css">
  <link rel="stylesheet" href="style/cadastrado_sucesso.css">
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div>
        <ul class="nav navbar-nav navbar-right espacamento-direita">
          <li><a href="home.php">Home</a></li>
          <li><a href="cadastro.php">Cadastro</a></li>
          <li><a href="unidades.php">Unidades</a></li>
          <?php 
          if (isset($_SESSION['usuario'])) {
            echo '<li><a href="listar_alunos.php">Alunos</a></li>';
            echo '<li><a href="logout.php">Logout</a></li>';
          } else {
            echo '<li><a href="login.php">Login</a></li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container h-1">
    <div class="row">
      <div class="col-sm-offset-4 col-sm-6 espacamento">
        <h1>Cadastrado com sucesso!</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-offset-4 col-sm-6 mg-top-30">
        <a class="botao" href="home.php">Voltar para home</a>
      </div>
    </div>
  </div>
</body>
</html>