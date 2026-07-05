<?php 
    session_start();
    require 'auth.php';
    require 'conectaBD.php';

    $id = $_GET['id']??'';

    $sql = "SELECT * FROM Alunos WHERE idAluno = '$id'";
    $resultado = $conn->query($sql);
    $aluno = $resultado->fetch_assoc();
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
  <link rel="stylesheet" href="style/editar.css">
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
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Editar Dados do Aluno</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="processa_edicao.php" method="POST" class="form-horizontal">
                    <input type="hidden" name="idAluno" value="<?php echo $aluno['idAluno']; ?>">
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label for="nome"><span class="required">*</span>Nome:</label>
                        </div>
                        <div class="col-sm-10">
                            <input required class="form-control" type="text" name="nome" value="<?php echo $aluno['nome']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label for="sobrenome"><span class="required">*</span>Sobrenome:</label>    
                        </div>
                        <div class="col-sm-10">
                            <input required class="form-control" type="text" name="sobrenome" value="<?php echo $aluno['sobrenome']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label for="cpf"><span class="required">*</span>CPF:</label>
                        </div>
                        <div class="col-sm-10">
                            <input required class="form-control" type="text" name="cpf" value="<?php echo $aluno['cpf']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label for="telefone"><span class="required">*</span>Telefone:</label>
                        </div>
                        <div class="col-sm-10">
                            <input required class="form-control" type="text" name="telefone" value="<?php echo $aluno['telefone']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-default" type="submit">Salvar Alterações</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


