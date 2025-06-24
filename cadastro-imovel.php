<?php
include("conexao.php");
include("protecao.php");

$msg = "";

$id_usuario = $_SESSION['id'] ?? null;

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save") {

    $nome = trim($_POST['nome'] ?? '');
    $tipo = trim($_POST['tipo'] ?? '');
    $cidade = trim($_POST['cidade'] ?? '');
    $bairro = trim($_POST['bairro'] ?? '');
    $comodos = trim($_POST['comodos'] ?? '');
    $matricula = trim($_POST['matricula'] ?? '');
    $metragem = trim($_POST['metragem'] ?? '');
    $valor = trim($_POST['valor'] ?? '');

    if ($nome && $tipo && $cidade && $bairro && $comodos && $matricula && $metragem && $valor) {
        try {
            $stmt = $conexao->prepare("
                INSERT INTO anuncio 
                (nome, tipo, cidade, bairro, comodos, matricula, metragem, valor, id_usuario) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");

            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $tipo);
            $stmt->bindValue(3, $cidade);
            $stmt->bindValue(4, $bairro);
            $stmt->bindValue(5, $comodos);
            $stmt->bindValue(6, $matricula);
            $stmt->bindValue(7, $metragem);
            $stmt->bindValue(8, $valor);
            $stmt->bindValue(9, $id_usuario);

            if ($stmt->execute()) {
                $msg = "Imóvel anunciado com sucesso!";
                $nome = $tipo = $cidade = $bairro = $comodos = $matricula = $metragem = $valor = null;
            } else {
                $msg = "Erro ao tentar efetivar o anúncio.";
            }
        } catch (PDOException $e) {
            $msg = "Erro no banco de dados: " . $e->getMessage();
        }
    } else {
        $msg = "Preencha todos os campos!";
    }
}
?>
