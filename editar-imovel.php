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

    header("Location: painel.php.php?msg=editado");
    exit;
}
?>
<form class="editar-imovel" method="post">
    <label>Nome do proprietário</label>
    <input type="text" name="nome" value="<?= htmlspecialchars($anuncio['nome']) ?>">

    <label>Tipo do imóvel</label>
    <input type="text" name="tipo" value="<?= htmlspecialchars($anuncio['tipo']) ?>">

    <label>Cidade</label>
    <input type="text" name="cidade" value="<?= htmlspecialchars($anuncio['cidade']) ?>"><br>

    <label>Bairro</label>
    <input type="text" name="bairro" value="<?= htmlspecialchars($anuncio['bairro']) ?>"><br>

    <label>Número de cômodos</label>
    <input type="number" name="comodos" value="<?= htmlspecialchars($anuncio['comodos']) ?>"><br>

    <label>Matrícula do cartório</label>
    <input type="text" name="matricula" value="<?= htmlspecialchars($anuncio['matricula']) ?>"><br>

    <label>Metragem do imóvel</label>
    <input type="number" step="0.01" name="metragem" value="<?= htmlspecialchars($anuncio['metragem']) ?>"><br>

    <label>Valor do imóvel</label>
    <input type="number" step="0.01" name="valor" value="<?= htmlspecialchars($anuncio['valor']) ?>"><br>

    <button type="submit">Salvar alterações</button>
</form>
