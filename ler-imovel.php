<?php
include("conexao.php");
include("protecao.php");

$msg = "";
$id_usuario = $_SESSION['id'] ?? null;

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save") {

    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');    
    $tipo = trim($_POST['tipo'] ?? '');
    $cidade = trim($_POST['cidade'] ?? '');
    $bairro = trim($_POST['bairro'] ?? '');
    $comodos = trim($_POST['comodos'] ?? '');
    $matricula = trim($_POST['matricula'] ?? '');
    $metragem = trim($_POST['metragem'] ?? '');
    $valor = trim($_POST['valor'] ?? '');

    if ($nome && $email && $tipo && $cidade && $bairro && $comodos && $matricula && $metragem && $valor) {
        try {
            $stmt = $conexao->prepare("
                INSERT INTO anuncio 
                (nome, email, tipo, cidade, bairro, comodos, matricula, metragem, valor, id_usuario) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $tipo);
            $stmt->bindValue(4, $cidade);
            $stmt->bindValue(5, $bairro);
            $stmt->bindValue(6, $comodos);
            $stmt->bindValue(7, $matricula);
            $stmt->bindValue(8, $metragem);
            $stmt->bindValue(9, $valor);
            $stmt->bindValue(10, $id_usuario);

            if ($stmt->execute()) {
                $msg = "Imóvel anunciado com sucesso!";
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
