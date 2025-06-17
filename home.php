<?php require_once 'cadeado.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container">
    

    <h1>Cadastro de Produtos</h1>

    <h2>Bem-vindo, <?= $_SESSION['usuario']; ?>!</h2>

    <p>
        <a href="cadastro_produto.php" class="btn btn-dark">Novo Produto</a>
    </p>

    <?php 

        require_once 'funcoes.php';

        tratar_erros();

        require_once 'conexao.php';

        $conn = conectar_banco();

        $id = $_SESSION['id'];

        $query = "SELECT id_produto, nome, preco, quantidade FROM tb_produtos
                  WHERE usuario_id = $id";

        $resultado = mysqli_query($conn, $query);

        $linhas = mysqli_affected_rows($conn);

        if ($linhas < 0) {
            exit("<h3>Erro ao buscar produtos do usuário.</h3>");
        }

        if ($linhas == 0) {
            exit('<h3>Você não tem produtos cadastrados!</h3>
            <p>
                <a href="logout.php">Logout</a>
            </p>');
        }
        
        echo "<h3>Lista de Produtos Cadastrados</h3>";


        echo '<table class="table table-hover">';
        echo "<tr>";
        echo "<th>Nome</th>";
        echo "<th>Preço</th>";
        echo "<th>Quantidade em Estoque</th>";
        echo "<th></th>";
        echo "</tr>";
                    
        while ($linha = mysqli_fetch_assoc($resultado)) {

            echo "<tr>";
            echo "<td>" . $linha['nome']  . "</td>";
            echo "<td>" . $linha['preco']  . "</td>";
            echo "<td>" . $linha['quantidade'] . "</td>";
            echo    '<td>';
            echo        '<a href="editar_produto.php?id_produto=';
            echo            $linha['id_produto'];
            echo        '" class="btn btn-primary btn-sm"> Editar </a>';
            echo ' | ';
            echo        '<a href="deletar_produto.php?id_produto=';
            echo            $linha['id_produto'];
            echo        '" class="btn btn-danger btn-sm"> Excluir </a>';
            echo    '</td>';
            echo "</tr>";

        }

        echo "</table>";

        mysqli_close($conn);

    ?>

    <p>
        <a href="logout.php">Logout</a>
    </p>

</body>
</html>