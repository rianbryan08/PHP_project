<?php include 'conexao.php';
session_start();

// Buscar filmes já cadastrados
$sql = "SELECT f.filme, f.titulo, f.ano, g.descricao as genero, g.genero as idGenero
            FROM filmes f
            INNER JOIN generos g ON (g.genero = f.genero)";
$result = $conn->query($sql);
?>

<html>

<head>
    <div class='name'>
        <h2>Olá <?= $_SESSION["nome"]; ?></h2>
    </div>
    <title>Cadastro de Filmes</title>
    <script>
        <?php
        if (isset($_GET['resposta']) && $_GET['resposta'] == 1) {
        ?>alert("incluido com sucesso");
        <?php
        } else if (isset($_GET['resposta']) && $_GET['resposta'] == 0) {
        ?>alert("erro ao inserir");
        <?php
        } ?>
    </script>
    <title>Cadastro de Gênero</title>
    <script>
        <?php
        if (isset($_GET['resposta']) && $_GET['resposta'] == 1) {
        ?>alert("incluido com sucesso");
        <?php
        } else if (isset($_GET['resposta']) && $_GET['resposta'] == 0) {
        ?>alert("erro ao inserir");
        <?php
        } ?>
    </script>

    <link rel="stylesheet" type="text/css" href="cadastro.css" />
</head>

<body>
    <br><br>
    <div class='f1'>
        <div class='filmes'>
            <h1>Cadastro de genero</h1>
            <form action="salvarGenero.php" method="POST">
                Gênero: <input type="text" name="genero"><br><br>
                Descrição: <input type="text" name="descricao"><br><br>
                Status: <input type="number" name="status"><br><br>
                <input type="submit" value="Cadastrar">
            </form>
        </div>

        <div class='filmes'>
            <h1>Cadastro de Filmes</h1>
            <form action="salvar.php" method="POST">
                Gênero: <input type="text" name="genero"><br><br>
                Título: <input type="text" name="titulo"><br><br>
                Ano: <input type="number" name="ano"><br><br>
                <input type="submit" value="Cadastrar">
            </form>
            <form action="deletar.php" method="POST">
                <input type="hidden" name="filme" value="<?php echo $filme; ?>">
            </form>
        </div>

        <div class="tbl">
            <h2>Filmes Cadastrados</h2>
            <table border="1">
                <tr>
                    <th>Gênero</th>
                    <th>Título</th>
                    <th>Ano</th>
                    <th>Excluir</th>
                </tr>
                <?php if ($result->num_rows > 0) { ?>
                    <?php while ($row = $result->fetch_object()) { ?>
                        <tr>
                            <td>
                                <?php
                                $sqlGeneros = "select genero, descricao from generos where status = 1";
                                $result = $conn->query($sqlGeneros);
                                ?>
                                <select name="genero" id="genero">
                                    <option value="">selecione uma opção</option>
                                    <?php
                                    while ($row2 = $result->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row2["genero"]; ?>" <?= ($row2["genero"] == $row->idGenero) ? 'selected' : ''; ?>><?php echo $row2["descricao"]; ?></option>
                                    <?php       } ?>
                                </select>
                            </td>
                            <td><?php echo htmlspecialchars($row->titulo); ?></td>
                            <td><?php echo htmlspecialchars($row->ano); ?></td>
                            <td><form action="deletar.php" method="post">
                                <input type="hidden" name="filme" value=<?=$row->filme;?>>
                                <input type="submit" value="Excluir">
                            </form></td>
                        </tr>

                    <?php
                    }
                } else { ?>
                    <tr>
                        <td colspan="4">Nenhum filme cadastrado.</td>
                    </tr>
                <?php } ?>
                <?php $conn->close(); ?>
            </table>
        </div>
    </div>
</body>

</html>