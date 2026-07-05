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
  <link rel="stylesheet" href="style/login.css">
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div>
        <ul class="nav navbar-nav navbar-right espacamento-direita">
          <li><a href="home.php">Home</a></li>
          <li><a href="cadastro.php">Cadastro</a></li>
          <li><a href="unidades.php">Unidades</a></li>
          <li><a class="active" href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container"> 
    <div class="row mg-top-150">
      <div class="col-sm-offset-4 col-sm-6 h-1">
        <h1>Painel Administrativo</h1>
      </div>
    </div>
    <form action="valida_login.php" method="POST" class="form-horizontal mg-top-20">
      <div class="form-group">
        <label for="email" class="col-sm-1 col-sm-offset-4">Email</label>
        <div class="col-sm-3">
          <input type="email" name="email" class="form-control" id="email">
        </div>
      </div>
      <div class="form-group">
        <label for="senha" class="col-sm-1 col-sm-offset-4">Password</label>
        <div class="col-sm-3">
          <input type="password" name="senha" class="form-control" id="senha">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-5 col-sm-3">
          <button type="submit" class="btn btn-default botao-login">Login</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>