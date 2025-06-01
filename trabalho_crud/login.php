<?php

include('conexao.php');

session_start();


if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "<div class=\"echo\">Preencha seu e-mail</div>";


    } else if (strlen($_POST['senha']) == 0) {
        echo "<div class=\"echo\">Preencha sua senha";
    } 
    else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
        
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
            echo "<div class=\"echo\">Falha ao logar! E-mail ou senha incorretos";
        }
    }
}

?>