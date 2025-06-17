<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container">

    <h1>Produtos Cadastrados</h1>

    <p>
        <a href="home.php">Voltar à Home</a>
    </p>

    <form action="salvar_produto.php" method="post">

        <label for="nome">Nome do Produto: </label><br>
        <input type="text" name="nome" id="nome"><br><br>

        <label for="preco">Preço: </label><br>
        <input type="text" name="preco" id="preco"><br><br>

        <label for="quantidade">Quantidade em Estoque: </label><br>
        <input type="number" name="quantidade" id="quantidade"><br><br>

        <button type="submit" class="btn btn-dark">Cadastrar</button>

    </form>
    
</body>
</html>