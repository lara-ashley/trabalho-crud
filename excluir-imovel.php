<?php
include ("protecao.php");
include ("conexao.php");

$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: ler-imovel.php?msg=ID inválido");
    exit;
}

$stmt = $conexao->prepare("SELECT * FROM anuncio WHERE id = ?");
$stmt->execute([$id]);
$anuncio = $stmt->fetch(PDO::FETCH_ASSOC);

if ($anuncio && $anuncio["id_usuario"] == $_SESSION["id"]) {
    $stmt = $conexao->prepare("DELETE FROM anuncio WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: painel.php?msg=excluido");
    exit;
} else {
    exit("Acesso negado.");
}
