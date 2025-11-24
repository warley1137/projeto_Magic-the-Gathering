<?php if (isset($_GET['sucesso'])): ?>
    <div style="padding: 10px; background: #c8ffc8; border: 1px solid #3a8f3a; margin: 10px;">
        Card cadastrado com sucesso!
    </div>
<?php endif; ?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link id="tema-css" rel="stylesheet" href="css/style_1.css" />
</head>

<body>
    <header>
        <h1 class="label_header" id="label1">
            <strong>Trabalho de Faculdade</strong>
        </h1>
        <p class="label_header" id="label2">
            <strong>Wyden</strong> - Unimetrocamp, Campinas-SP
        </p>

        <div class="tag_flex">
            <button class="button_header" id="btn-tema">Alternar Tema</button>

            <a href="../index.php">
                <button class="button_header button-space" id="Home">Home</button>
            </a>

            <a href="project_01.html">
                <button class="button_header button-space" id="Project">
                    Project
                </button>
            </a>

            <a href="contact_01.html">
                <button class="button_header button-space" id="Contact">
                    Contact
                </button>
            </a>

            <a href="collections_01.php">
                <button class="button_header button-space" id="Collections">
                    Your Collections
                </button>
            </a>
        </div>
    </header>

    <main id="main_collection">
        <section id="section_collection">

                <h2>Suas coleções</h2>


            <label><strong>Veja suas cartas cadastradas:</strong></label>

            <div id="container_collection">
                <!-- FORMULÁRIO DE CADASTRO -->
                <form action="../inserir.php" method="POST">
                    <p>Nome:</p> <input type="text" name="nome" required />
                    <p>Coleção:</p> <input type="text" name="colecao" required />
                    <p>Número:</p> <input type="text" name="numero" required />
                    <p>Quantidade:</p>
                    <input type="number" name="quantidade" required />

                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </section>

        <section class="cards-background">
            <div id="cards">
                <?php
                include '../conexao.php';

                // AQUI AGORA ESTÁ CORRETO: BUSCA NA TABELA "cards"
                $sql = "SELECT * FROM cards ORDER BY nome ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    echo "<table class='tabela-colecao'>";
                    echo "<tr>
                            <th>Nome</th>
                            <th>Coleção</th>
                            <th>Número</th>
                            <th>Quantidade</th>
                          </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['colecao'] . "</td>";
                        echo "<td>" . $row['numero'] . "</td>";
                        echo "<td>" . $row['quantidade'] . "</td>";
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
        <h3>Veja mais nos seus GitHubs</h3>
        <div class="flex_footer-space">
            <button id="Contact_Guilherme" class="button_footer">
                <p>Guilherme</p>
            </button>

            <button id="Contact_Felipe" class="button_footer">
                <p>Felipe</p>
            </button>

            <button id="Contact_Lucas" class="button_footer">
                <p>Lucas</p>
            </button>

            <button id="Contact_Warley" class="button_footer">
                <p>Warley</p>
            </button>
        </div>
    </footer>

    <script src="js/changeStyle.js" defer></script>
</body>
</html>
