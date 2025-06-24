<?php
include ("conexao.php"); 

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save") {

    $nome = ($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');
    $confirmar_senha = trim($_POST['confirmar_senha'] ?? '');

    if ($nome != '' && $email != '' && $senha != '' && $confirmar_senha != '') {
        
        if ($senha !== $confirmar_senha) {
            $erro = "As senhas não coincidem!";
        } else {
            try {
                $stmt = $conexao->prepare("INSERT INTO cadastro (nome, email, senha) VALUES (?, ?, ?)");
                $stmt->bindValue(1, $nome);
                $stmt->bindValue(2, $email);
                $stmt->bindValue(3, $senha);
                $id_inserido = $conexao->lastInsertId();
                
                if ($stmt->execute()) {
                    if ($stmt->rowCount() > 0) {
                        $erro = "Dados cadastrados com sucesso!";
                        $nome = $email = $senha = $confirmar_senha = null;
                    } else {
                        $erro = "Erro ao tentar efetivar cadastro.";
                    }
                } else {
                    throw new PDOException("Erro: Não foi possível executar a declaração SQL");
                }
            } catch (PDOException $erro) {
                $erro = "Erro: " . $erro->getMessage();
            }
        }
    } else {
        $erro = "Preencha todos os campos!";
    }
}


?>
