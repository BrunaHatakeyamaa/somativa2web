<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "EscolaPilates"; 

$conn = new mysqli($servidor, $usuario, $senha, $banco);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Falha ao conectar: " . $conn->connect_error);
}
?>
