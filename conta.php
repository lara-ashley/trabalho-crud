<?php
include ("protecao.php");
include ("conexao.php");

$id_usuario = $_SESSION["id"];
$stmt = $conexao->prepare("SELECT * FROM cadastro WHERE id = ?");
$stmt->execute([$id_usuario]);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$msg = $_GET['msg'] ?? '';
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

<body class="main-conta">

    <section class="navbar">

        <a class="link" href="painel.php">Ínicio</a>
        <a class="link" href="imoveis.php">Compra</a>
        <a class="link" href="anuncio.php">Anúncio</a>
        <a class="link" href="busca.php">Buscar imóveis</a>
        <a class="link" href="conta.php">Conta</a>
        <img class="menu" src="assets/menu" alt="Menu">

    </section>

    <?php if (isset($erro)) { echo "<p class=\"echo\">$erro</p>"; } ?>
    <table class="tabela-conta">
        <tr><th>ID</th><th>Nome</th><th>Email</th><th>senha</th><th>Ações</th></tr>
        <?php foreach ($dados as $linha): ?>
            <tr>
                <td><?= $linha['id'] ?></td>
                <td><?= $linha['nome'] ?></td>
                <td><?= $linha['email'] ?></td>
                <td><?= $linha['senha'] ?></td>

                <td>
                    <a href="editar-cadastro.php?id=<?= $linha['id'] ?>">Editar</a> |
                    <a href="excluir-cadastro.php?id=<?= $linha['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

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
