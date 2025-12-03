<?php
include 'conexao.php';

// Verifica se está EDITANDO
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM cards WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $linha = $result->fetch_assoc();
    } else {
        $linha = ['id'=>'','nome'=>'','colecao'=>'','numero'=>'','quantidade'=>''];
    }

} else {
    // Caso seja cadastro
    $linha = ['id'=>'','nome'=>'','colecao'=>'','numero'=>'','quantidade'=>''];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coleções</title>
    <link id="tema-css" rel="stylesheet" href="css/style_1.css" />
</head>

<body>

<header>
    <h1 class="label_header"><strong>Trabalho de Faculdade</strong></h1>
    <p class="label_header"><strong>Wyden</strong> - Unimetrocamp, Campinas-SP</p>

    <div class="tag_flex">
        <button class="button_header" id="btn-tema">Alternar Tema</button>

        <a href="index.php"><button class="button_header button-space">Home</button></a>
        <a href="project_01.html"><button class="button_header button-space">Project</button></a>
        <a href="contact_01.html"><button class="button_header button-space">Contact</button></a>
        <a href="collections_01.php"><button class="button_header button-space">Your Collections</button></a>
    </div>
</header>


<main id="main_collection">

<section id="section_collection">
    <h2>Suas coleções</h2>

    <label><strong>Formulário:</strong></label>

    <div id="container_collection">

        <form action="acao.php" method="POST">

            <input type="hidden" name="id" value="<?= $linha['id'] ?>">

            <p>Nome:</p>
            <input type="text" name="nome" value="<?= $linha['nome'] ?>" required>

            <p>Coleção:</p>
            <input type="text" name="colecao" value="<?= $linha['colecao'] ?>" required>

            <p>Número:</p>
            <input type="text" name="numero" value="<?= $linha['numero'] ?>" required>

            <p>Quantidade:</p>
            <input type="number" name="quantidade" value="<?= $linha['quantidade'] ?>" required>

            <button type="submit" name="acao" value="cadastrar">Cadastrar</button>
            <button type="submit" name="acao" value="update">Alterar</button>
            <button type="submit" name="acao" value="excluir">Excluir</button>

        </form>

    </div>
</section>


<section class="cards-background">
<div id="cards">

<?php
$sql = "SELECT * FROM cards ORDER BY nome ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table class='tabela-colecao'>";
    echo "<tr>
            <th>Nome</th>
            <th>Coleção</th>
            <th>Número</th>
            <th>Quantidade</th>
            <th>Ações</th>
         </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['nome']."</td>";
        echo "<td>".$row['colecao']."</td>";
        echo "<td>".$row['numero']."</td>";
        echo "<td>".$row['quantidade']."</td>";
        echo "<td><a href='collections_01.php?id=".$row['id']."'>Editar</a></td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "<p>Nenhuma carta cadastrada ainda.</p>";
}

$conn->close();
?>

</div>
</section>

</main>


<footer>
    <h3>Veja mais nos GitHubs</h3>

    <div class="flex_footer-space">
        <button class="button_footer"><p>Guilherme</p></button>
        <button class="button_footer"><p>Felipe</p></button>
        <button class="button_footer"><p>Lucas</p></button>
        <button class="button_footer"><p>Warley</p></button>
    </div>
</footer>

<script src="js/change_style.js" defer></script>

</body>
</html>
