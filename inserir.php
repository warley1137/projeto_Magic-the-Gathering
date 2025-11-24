<?php
include 'conexao.php';

$nome = $_POST['nome'];
$colecao = $_POST['colecao'];
$numero = $_POST['numero'];
$quantidade = $_POST['quantidade'];

$sql = "INSERT INTO cards (nome, colecao, numero, quantidade)
        VALUES ('$nome', '$colecao', '$numero', $quantidade)";

if ($conn->query($sql) === TRUE) {
    header("Location: projeto_Magic-the-Gathering-main/collections_01.php?sucesso=1");
    exit;
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
