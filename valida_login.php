<?php
    session_start(); // 1. LIGA A MÁQUINA DE SESSÕES (Obrigatório ser a 1ª coisa)
    require 'conectaBD.php';

    $email_digitado = trim($_POST['email'] ?? '');
    $senha_digitada = $_POST['senha'] ?? '';

    $stmt = $conn->prepare("
        SELECT idUsuario,email,senha
        FROM Usuarios
        WHERE email = ?
    ");

    $stmt->bind_param("s",$email_digitado);

    $stmt->execute();

    $resultado = $stmt->get_result();   

    if ($resultado->num_rows == 1) {

        $usuario = $resultado->fetch_assoc();

        if(password_verify($senha_digitada,$usuario["senha"])){

            session_regenerate_id(true);

            $_SESSION["usuario"] = [

                "id"=>$usuario["idUsuario"],
                "email"=>$usuario["email"]

            ];

            header("Location:listar_alunos.php");
            exit;
        } 
    } else {
        header("Location: login_invalido.php");
        exit; 
    }

    $conn->close();
?>