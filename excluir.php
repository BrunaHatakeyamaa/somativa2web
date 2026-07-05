<?php 
    session_start();
    require 'auth.php';
    require 'conectaBD.php';

    $id = $_GET['id'];
    $stmt=$conn->prepare("
        DELETE FROM Alunos
        WHERE idAluno=?
    ");

    $stmt->bind_param("i",$id);

    if ($stmt->execute() === TRUE) {
        header("Location: listar_alunos.php");
        exit;
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }

    $conn->close();
    ?>

