<?php
include("protecao.php");
include("conexao.php");
$id = $_GET['id'] ?? null;

if (!$id) {
    exit("ID inválido.");
}

$stmt = $conexao->prepare("SELECT * FROM anuncio WHERE id = ?");
$stmt->execute([$id]);
$anuncio = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$anuncio || $anuncio['id_usuario'] != $_SESSION["id"]) {
    exit("Acesso negado");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conexao->prepare("
        UPDATE anuncio SET 
            nome = ?,  
            tipo = ?, 
            cidade = ?, 
            bairro = ?, 
            comodos = ?, 
            matricula = ?, 
            metragem = ?, 
            valor = ? 
        WHERE id = ?
    ");
    $stmt->execute([
        $_POST["nome"],
        $_POST["tipo"],
        $_POST["cidade"],
        $_POST["bairro"],
        $_POST["comodos"],
        $_POST["matricula"],
        $_POST["metragem"],
        $_POST["valor"],
        $id
    ]);

    header("Location: painel.php?msg=editado");
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de editar cadastro do imóvel</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

</head>
<body class ="main-imovel">

    <section class="navbar">

        <a class="link" href="painel.php">Ínicio</a>
        <a class="link" href="imoveis.php">Compra</a>
        <a class="link" href="anuncio.php">Anúncio</a>
        <a class="link" href="busca.php">Buscar imóveis</a>
        <a class="link" href="conta.php">Conta</a>
        <img class="menu" src="assets/menu" alt="Menu">
        
    </section>

    <form class="editar-imovel" method="post">
        <?php if (isset($msg)) { echo "<p class=\"echo\">$msg</p>"; } ?>
        <div>
        <label>Nome do proprietário</label>
        <input class = "input-editar-imovel" type="text" name="nome" value="<?= htmlspecialchars($anuncio['nome']) ?>">
        </div>

        <div>
        <label>Tipo do imóvel</label>
        <input class = "input-editar-imovel" type="text" name="tipo" value="<?= htmlspecialchars($anuncio['tipo']) ?>">
        </div>

        <div>
        <label>Cidade</label>
        <input class = "input-editar-imovel" type="text" name="cidade" value="<?= htmlspecialchars($anuncio['cidade']) ?>">
        </div>

        <div>
        <label>Bairro</label>
        <input class = "input-editar-imovel" type="text" name="bairro" value="<?= htmlspecialchars($anuncio['bairro']) ?>">
        </div>

        <div>
        <label>Número de cômodos</label>
        <input class = "input-editar-imovel" type="number" name="comodos" value="<?= htmlspecialchars($anuncio['comodos']) ?>">
        </div>

        <div>
        <label>Matrícula do cartório</label>
        <input class = "input-editar-imovel" type="text" name="matricula" value="<?= htmlspecialchars($anuncio['matricula']) ?>">
        </div>


        <div>
        <label>Metragem do imóvel</label>
        <input class = "input-editar-imovel" type="number" step="0.01" name="metragem" value="<?= htmlspecialchars($anuncio['metragem']) ?>">
        </div>

        <div>
        <label>Valor do imóvel</label>
        <input class = "input-editar-imovel" type="number" step="0.01" name="valor" value="<?= htmlspecialchars($anuncio['valor']) ?>">
        </div>

        <div class = "div-botao-editar" >
            <button class = "botao-editar-imovel" type="submit">Salvar alterações</button>
        </div>
    </form>

    
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