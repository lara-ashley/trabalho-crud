<?php
include("protecao.php");
include("conexao.php");

session_start();

$id_imovel = $_GET['id'] ?? null;  

if (!$id_imovel) {
    header("Location: painel.php");
    exit;
}

$stmt = $conexao->prepare("SELECT id_usuario FROM anuncio WHERE id = ?");
$stmt->execute([$id_imovel]);
$imovel = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$imovel) {

    header("Location: painel.php");
    exit;
}

if ($imovel['id_usuario'] == $_SESSION['usuario_id']) {

    $stmt = $conexao->prepare("DELETE FROM anuncio WHERE id = ?");
    $stmt->execute([$id_imovel]);

    header("Location: painel.php?msg=Anúncio excluído com sucesso");
    exit;
} else {

    header("Location: painel.php?msg=Acesso negado");
    exit;
}
