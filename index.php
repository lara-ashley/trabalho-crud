<?php

include('conexao.php');
include('login.php');

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

</head>

<body>

      <div class="main-login">  

        <div class= "esquerda"><img class="logo" src="assets/logo_seular.png" alt="SeuLar"></div>

        <div class="direita">

            <div class="formulario-login">

                <form action="" method="POST">
                    <?php if (isset($erro)) { echo "<p class=\"echo\">$erro</p>"; } ?>
                    <label>E-mail</label>
                    <input  placeholder="123@gmail.com" class="caixa-input" type="email" name="email">
                
                    <label>Senha</label>
                    <input placeholder="12345678" class="caixa-input" type="password" name="senha">

                    <div class="botao">

                        <button class="botao-login" type="submit">Entrar</button>

                    </div>

                    <a class="link-cadastro" href="tela-cadastro.php">Cadastri-se</a>
                
            </form>

        </div>

    </div>

</div>

</body>

</html>