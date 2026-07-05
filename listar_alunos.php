<?php 
    session_start();
    require 'auth.php';
    require 'conectaBD.php';

    $sql = "SELECT idAluno, nome, sobrenome, cpf, telefone FROM Alunos";
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
  <link rel="stylesheet" href="style/listar_alunos.css">
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
            echo '<li><a class="active" href="listar_alunos.php">Alunos</a></li>';
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
            <div class="col-sm-12 mg-top-30">
                <h2 class="h-1 tamanho-fonte-40">Alunos Matriculados na Escola de Pilates</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mg-top-45">
                <table class="table table-striped league-spartan">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($resultado->num_rows>0) {
                            while($linha=$resultado->fetch_assoc()){
                                echo "<tr>";
                                echo "<td>" . $linha["idAluno"] . "</td>";
                                echo "<td>" . $linha["nome"] . "</td>";
                                echo "<td>" . $linha["sobrenome"] . "</td>";
                                echo "<td>" . $linha["cpf"] . "</td>";
                                echo "<td>" . $linha["telefone"] . "</td>";
                                echo "<td>
                                    <a class='mr-10' href='editar.php?id=" . $linha["idAluno"] . "'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a> 
                                    <a href='excluir.php?id=" . $linha["idAluno"] . "' onclick='return confirm(\"Realmente deseja deletar?\")'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>
                                </td>"; 
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>Ainda não há alunos cadastrados.</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

    
</body>
</html>