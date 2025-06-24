<?php
include("protecao.php");
include("conexao.php");
include("cadastro-imovel.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de anúncio</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body class="anuncio">

    <section class="navbar">
        <a class="link" href="painel.php">Ínicio</a>
        <a class="link" href="imoveis.php">Compra</a>
        <a class="link" href="anuncio.php">Anúncio</a>
        <a class="link" href="busca.php">Buscar imóveis</a>
        <a class="link" href="conta.php">Conta</a>
        <img class="menu" src="assets/menu" alt="Menu">
    </section>

    <div class="formulario-anuncio">

<form action="?act=save" method="POST">


    <div class="campo-formulario">
        <label for="nome">Nome do proprietario</label>
        <input class="caixa-anuncio" type="text" name="nome" id="nome">
    </div>

    <div class="campo-formulario">
        <label for="tipo">Tipo do imóvel</label>
        <input class="caixa-anuncio" type="text" name="tipo" id="tipo">
    </div>

    <div class="campo-formulario">
        <label for="cidade">Cidade</label>
        <input class="caixa-anuncio" type="text" name="cidade" id="cidade">
    </div>

    <div class="campo-formulario">
        <label for="bairro">Bairro</label>
        <input class="caixa-anuncio" type="text" name="bairro" id="bairro">
    </div>

    <div class="campo-formulario">
        <label for="comodos">Número de cômodos</label>
        <input class="caixa-anuncio" type="number" name="comodos" id="comodos">
    </div>

    <div class="campo-formulario">
        <label for="matricula">Matrícula do cartório</label>
        <input class="caixa-anuncio" type="number" name="matricula" id="matricula">
    </div>

    <div class="campo-formulario">
        <label for="metragem">Metragem do imóvel</label>
        <input class="caixa-anuncio" type="number" name="metragem" id="metragem">
    </div>

     <div class="campo-formulario">
        <label for="valor">Valor do imóvel</label>
        <input class="caixa-anuncio" type="number" name="valor" id="valor">
     </div>

        <?php if (isset($msg)) { echo "<p class=\"echo\">$msg</p>"; } ?>

    <div class="botao-a">
        <button class="botao-anuncio" type="submit">Anunciar</button>
    </div>
</form>

</div>
    <footer class="footer">
        <div class="container-footer">
            <div class="footer-logo">
                <img src="assets/logo_seular.png" alt="Logo Seu Lar">
                <p>&copy; <?= date("Y") ?> Seu Lar. Todos os direitos reservados.</p>
            </div>

            <div class="footer-links">
                <a href="sobre.php">Sobre Nós</a>
                <a href="contato.php">Contato</a>
                <a href="termos.php">Termos de Uso</a>
                <a href="privacidade.php">Política de Privacidade</a>
                <a href="logout.php">Sair</a>
                <a href="tela-cadastro.php">Cadastre-se</a>
                <a href="index.php">Acessar conta</a>
            </div>

            <div class="footer-social">
                <a href="https://facebook.com" target="_blank">Facebook</a>
                <a href="https://instagram.com" target="_blank">Instagram</a>
                <a href="https://linkedin.com" target="_blank">LinkedIn</a>
            </div>

    </footer>

</body>
</html>
