<?php 
    session_start();
    
    require 'conectaBD.php';

    $sql = "SELECT idUnidade, nomeUnidade FROM unidades";
    $resultado = $conn->query($sql);
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
  <link rel="stylesheet" href="style/cadastro.css">
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div>
        <ul class="nav navbar-nav navbar-right espacamento-direita">
          <li><a href="home.php">Home</a></li>
          <li><a class="active" href="cadastro.php">Cadastro</a></li>
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
      
  <div class="container">
    <div class="row espacamento">
      <div class="col-md-12 ">
        <h1 class="titulo" >Insira seus dados:</h1>
      </div>
    </div>  
    <div class="row espacamento">
      <div class="col-md-12">
        <form action="processa_cadastro.php" method="post" class="form-horizontal">
          <div class="form-group">
            <label for="nome" class="col-sm-2 form-titulo"><span class="required">*</span>Nome:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-2 informacao-cadastro">
              <label for="sobrenome"><span class="required">*</span>Sobrenome:</label>
            </div>
            <div class="col-sm-10">
              <input type="text" id="sobrenome" name="sobrenome" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-2">
              <label for="nascimento"><span class="required">*</span>Nascimento:</label>
            </div>
            <div class="col-md-4 col-sm-10">
              <input type="date" id="nascimento" name="nascimento" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-2">
              <label for="cpf"><span class="required">*</span>CPF:</label>
            </div>
            <div class="col-md-4 col-sm-10">
              <input type="text" id="cpf" name="cpf" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-2">
              <label for="cep"><span class="required">*</span>CEP:</label>
            </div>
            <div class="col-md-4 col-sm-10">
              <input type="text" id="cep" name="cep" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-2">
              <label for="telefone"><span class="required">*</span>Telefone:</label>
            </div>
            <div class="col-md-4 col-sm-10">
              <input type="text" id="telefone" name="telefone" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label for="unidade"><span class="required">*</span>Unidade onde quer realizar a matrícula:</label>
            </div>
          </div>
        <div class="form-group">
          <div class="col-md-3 col-sm-6">
            <select name="idUnidade" id="idUnidade" class="form-control">
              <?php
                if ($resultado->num_rows>0) {
                  while($linha=$resultado->fetch_assoc()){
                    echo '<option value="' . $linha["idUnidade"] . '">' . $linha["nomeUnidade"] . '</option>';
                  }
                }
                $conn->close();
              ?>
            </select>
          </div>
        </div> 
          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-default">Enviar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>