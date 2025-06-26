<?php include ("cadastro.php");
include("protecao.php");

?>


<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">


</head>

<body>
    
    <div class="main-cadastro">  

        <div class= "esquerda"><img class="logo" src="assets/logo_seular.png" alt="SeuLar"></div>

        <div class="direita">

            <div class="formulario-cadastro">

                <form action="?act=save" method="POST">
                    
                    <?php if (isset($erro)) { echo "<p class=\"echo\">$erro</p>"; } ?>
                    <label>Nome</label>
                    <input  placeholder="Lara Ashley " class="caixa-input" type="text" name="nome">
                
                    <label>email</label>
                    <input placeholder="lara@ashley" class="caixa-input" type="email" name="email">

                    <label>Senha</label>
                    <input placeholder="12345678" class="caixa-input" type="password" name="senha">

                    <label>Confirme sua senha</label>
                    <input placeholder="12345678" class="caixa-input" type="password" name="confirmar_senha">

                    
                    <div class="botao">

                        <button class="botao-cadastro" type="submit">Criar conta</button>

                    </div>

                    <a class="link-login" href="index.php">Acessar conta</a>
                
                </form>

            </div>

        </div>

    </div>


    </body>

</html>