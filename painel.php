<?php

include('protecao.php');
include('conexao.php');
$stmt = $conexao->query("SELECT * FROM anuncio");
$anuncios = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

<body class="painel">


</body>
</html>


    <section class="navbar">

        <a class="link" href="painel.php">Ínicio</a>
        <a class="link" href="imoveis.php">Compra</a>
        <a class="link" href="anuncio.php">Anúncio</a>
        <a class="link" href="busca.php">Buscar imóveis</a>
        <a class="link" href="conta.php">Conta</a>

        <img class="menu" src="assets/menu" alt="Menu">
    </section>

    <div class="caixa-painel">

        <div>

            <p>Encontre aqui um lugar para chamar de seu </p>
            
            <?php foreach ($anuncios as $a): ?>
                <div class="caixa-imovel">

                    <p>
                        <?= htmlspecialchars($a['tipo']) ?> - Cidade: 
                        <?= htmlspecialchars($a['cidade']) ?> 
                        - Bairro: <?= htmlspecialchars($a['bairro']) ?>
                    </p>
                    <p> 
                        Valor: R$ <?= number_format($a['valor'], 2, ',', '.') ?> 
                        - Cômodos possui: <?= htmlspecialchars($a['comodos']) ?> 
                    </p>
                    <p>
                        Metragem: <?= htmlspecialchars($a['metragem']) ?> 
                        - Matricula do cartório: <?= htmlspecialchars($a['matricula']) ?>
                    </p>

                    <?php if (isset($_SESSION['id']) && $_SESSION['id'] == $a['id_usuario']): ?>
                        <div class = "caixa-link-imovel"><a class = "link" href="editar-imovel.php?id=<?= $a['id'] ?>"><p>Editar</p></a>
                        <a class = "link" href="excluir-imovel.php?id=<?= $a['id'] ?>" onclick="return confirm('Deseja excluir este anúncio?')"><p>Excluir</p></a></div>
                    <?php endif; ?>
                </div>

            <?php endforeach; ?>


             </div>
        </div>

        <div></div>

    </div>

    <div class="img-casa">
            
    </div>


    <footer class="footer">
        <div class="container-footer">

            <div class="footer-logo">
                <img src="assets/logo_seular.png" alt="Logo Seu Lar">
                <p>&copy; <?php echo date("Y"); ?> Seu Lar. Todos os direitos reservados.</p>
            </div>

            <div class="footer-links">
                <a href="sobre.php">Sobre Nós</a>
                <a href="contato.php">Contato</a>
                <a href="termos.php">Termos de Uso</a>
                <a href="privacidade.php">Política de Privacidade</a>
                <a href="logout.php">Sair</a>
                <a href="tela-cadastro.php">Cadastri-se</a>
                <a href="index.php">Acessar conta</a>

            </div>

            <div class="footer-social">
                <a href="https://facebook.com" target="_blank">Facebook</a>
                <a href="https://instagram.com" target="_blank">Instagram</a>
                <a href="https://linkedin.com" target="_blank">LinkedIn</a>

            </div>

        </div>

    </footer>

    
</body>

</html>