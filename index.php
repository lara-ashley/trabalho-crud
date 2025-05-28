<?php

include('conexao.php');

session_start();

if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";

    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
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
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

</head>

<body>

      <div class="main_login">  

        <div class= "esquerda"><img class="logo" src="assets/logo_seular.png" alt="SeuLar"></div>

        <div class="direita">

            <div class="formulario">

                <form action="" method="POST">
                
                    <label>E-mail</label>
                    <input  placeholder="123@gmail.com" class="caixa_input" type="text" name="email">
                
                    <label>Senha</label>
                    <input placeholder="12345678" class="caixa_input" type="password" name="senha">

                    <div class="botao">

                        <button class="botao_login" type="submit">Entrar</button>

                    </div>

                    <a class="link_cadastro" href="cadastro.php">Cadastri-se</a>
                
            </form>

        </div>

    </div>

</div>

</body>

</html>