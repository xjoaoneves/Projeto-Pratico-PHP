<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container">
    

    <h1>Cadastro de Usuário</h1>

    <p>
        <a href="index.php">Voltar para Login</a>
    </p>

    <form action="salvar_usuario.php" method="post">

        <label for="usuario">Nome do Usuário </label><br>
        <input type="text" name="usuario" id="usuario"><br><br>

        <label for="senha">Senha: </label><br>
        <input type="password" name="senha" id="senha"><br><br>

        <label for="email">E-mail: </label><br>
        <input type="text" name="email" id="email"><br><br>

        <button type="submit" class="btn btn-success">Cadastrar</button>

    </form>
</body>
</html>