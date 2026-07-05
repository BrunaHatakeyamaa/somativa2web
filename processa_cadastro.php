<?php
    session_start();

    require 'conectaBD.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $nome = $_POST['nome'] ?? "";
        $sobrenome = $_POST['sobrenome'] ?? "";
        $nascimento = $_POST['nascimento'] ?? NULL;
        $cpf = $_POST['cpf'] ?? "";
        $cep = $_POST['cep'] ?? "";
        $telefone = $_POST['telefone'] ?? "";
        $idUnidade = $_POST['idUnidade'] ?? 1; 

        if(!empty($nome)) {

            $stmt=$conn->prepare("
                INSERT INTO Alunos(nome, sobrenome, nascimento, cpf, cep, telefone, idUnidade)
                VALUES (?, ?, ?, ?, ?, ?, ?)
            ");

            $stmt->bind_param("ssssssi",$nome, $sobrenome, $nascimento, $cpf, $cep, $telefone, $idUnidade);

            if ($stmt->execute() === TRUE) {
                header("Location:cadastrado_sucesso.php");
                exit;
            } else {
                header("Location:home.php");
                exit;
            }
        } else {
            header("Location:home.php");
            exit;
        }
    }
    $conn->close();
?>