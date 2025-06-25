<?php
include ("protecao.php");
include ("conexao.php");

$id = $_SESSION['id'];

$stmt = $conexao->prepare("SELECT * FROM cadastro WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $stmt = $conexao->prepare("UPDATE cadastro SET nome = ?, email = ?, senha = ? WHERE id = ?");
    if ($stmt->execute([$nome, $email, $senha, $id])) {
        $_SESSION["nome"] = $nome;
        header("Location: conta.php?msg=Dados_atualizados");
        exit;
    } else {
        $msg = "Erro ao atualizar dados.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Conta</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body class="editar">

    <section class="navbar">
        <a class="link" href="painel.php">Início</a>
        <a class="link" href="imoveis.php">Compra</a>
        <a class="link" href="anuncio.php">Anúncio</a>
        <a class="link" href="busca.php">Buscar imóveis</a>
        <a class="link" href="conta.php">Conta</a>
        <img class="menu" src="assets/menu" alt="Menu">
    </section>

    <div class = "main-editar">

    <form class="form-editar" method="post">
        <label>Nome</label>
        <input class="input-editar" type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>"><br>

        <label>Email</label>
        <input class="input-editar" type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>"><br>

        <label>Senha</label>
        <input class="input-editar" type="int" name="senha" value="<?= htmlspecialchars($usuario['senha']) ?>"><br>

        <button class="botao-editar" type="submit">Salvar</button>
        <div class="link_voltar"><a href="painel.php">Voltar</a></div>
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
