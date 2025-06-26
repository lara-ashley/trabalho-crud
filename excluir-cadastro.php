<?php
include ("protecao.php");
include ("conexao.php");



$id = $_GET['id'] ?? null;
if ($id == $_SESSION["id"]) {
    $stmt = $conexao->prepare("DELETE FROM cadastro WHERE id = ?");
    $stmt->execute([$id]);
    session_destroy(); 
    header("Location: index.php?msg=Conta excluída!");
    exit;
} else {
    header("Location: painel.php");
    exit;
}

?>