<?php

include('conexao.php');

session_start();


if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        $erro = "Preencha seu e-mail";

    } else if (strlen($_POST['senha']) == 0) {
        $erro = "Preencha sua senha";
    } 
    else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $stmt = $conexao->prepare("SELECT * FROM cadastro WHERE email = :email AND senha = :senha");
        
        $stmt->bindvalue(':email', $email);
        $stmt->bindvalue(':senha', $senha); 
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id'] = $usuario['id'];
            header("Location: painel.php");
            exit;
        } 
        else {
            $erro = "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}

?>