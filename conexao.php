<?php

$usuario = 'root';
$senha = '';
$database = 'seular';
$host = 'localhost';

try {
    $conexao = new PDO("mysql:host=$host;dbname=$database;charset=utf8", "$usuario", "");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco: " . $e->getMessage());
}
?>
