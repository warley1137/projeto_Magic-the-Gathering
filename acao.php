<?php
include 'conexao.php';

$acao = $_POST['acao'];

if ($acao === "cadastrar") {

    $nome = $_POST['nome'];
    $colecao = $_POST['colecao'];
    $numero = $_POST['numero'];
    $quantidade = $_POST['quantidade'];
    
    $sql = "INSERT INTO cards (nome, colecao, numero, quantidade)
            VALUES ('$nome', '$colecao', '$numero', '$quantidade')";

    $conn->query($sql);
    header("Location: collections_01.php");
    exit;
}

if ($acao === "update") {

    $id = $_POST['id'];  // vem do hidden input

    // Se ID vier vazio, não faz update
    if ($id === "" || !is_numeric($id)) {
        header("Location: collections_01.php");
        exit;
    }

    $nome = $_POST['nome'];
    $colecao = $_POST['colecao'];
    $numero = $_POST['numero'];
    $quantidade = $_POST['quantidade'];
    
    $sql = "UPDATE cards SET 
                nome = '$nome',
                colecao = '$colecao',
                numero = '$numero',
                quantidade = '$quantidade'
            WHERE id = $id";

    $conn->query($sql);
    header("Location: collections_01.php");
    exit;
}

if ($acao === "excluir") {

    $id = $_POST['id'];

    if ($id !== "" && is_numeric($id)) {
        $sql = "DELETE FROM cards WHERE id = $id";
        $conn->query($sql);
    }

    header("Location: collections_01.php");
    exit;
}

$conn->close();
?>
