<?php
session_start();
require 'auth.php';
require 'conectaBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['idAluno'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];

    $stmt=$conn->prepare("
        UPDATE Alunos
        SET nome=?, sobrenome=?, cpf=?, telefone=?
        WHERE idAluno=?
    ");

    $stmt->bind_param("ssssi",$nome,$sobrenome, $cpf, $telefone,$id);

    if ($stmt->execute() === TRUE) {
        header("Location: listar_alunos.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
$conn->close();
?>