<?php 
    session_start();
    
    require 'conectaBD.php';

    $sql = "SELECT idUnidade, nomeUnidade, endereco, imagem FROM unidades";
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
  <link rel="stylesheet" href="style/unidades.css">
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div>
        <ul class="nav navbar-nav navbar-right espacamento-direita">
          <li><a href="home.php">Home</a></li>
          <li><a href="cadastro.php">Cadastro</a></li>
          <li><a class="active" href="unidades.php">Unidades</a></li>
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
      <div class="col-md-12">
        <h1>Nossas unidades:</h1>
      </div>
    </div>
    <div class="row ">
      <?php
				if ($resultado->num_rows>0) {
					while($linha=$resultado->fetch_assoc()){
						echo '<div class="col-md-6 espacamentounidades">';
						echo '<div class="row">';
						echo '<div class="col-md-6">';
						echo '<img src="assets/' . $linha["imagem"] . '">';
						echo '</div>';
          	echo '<div class="col-md-6">';
            echo '<div class="row">';
            echo '<div class="col-md-12">';
            echo '<h2>' . $linha["nomeUnidade"] . '</h2>';
          	echo '</div>';
            echo '</div>';
            echo '<div class="row">';
            echo '<div class="col-md-12">';
            echo '<p>' . $linha["endereco"] . '</p>';
            echo '</div>';
            echo '</div>';
          	echo '</div>';
        		echo '</div>';
            echo '</div>';
					} 
				}
				$conn->close();
      ?>
    </div>
  </div>
</body>
</html>