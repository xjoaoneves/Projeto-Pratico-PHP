<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container">
    
    <h1>Cadastro de Produtos - Login</h1>

    <h2>Informe os dados para login:</h2>
    
    <?php 
    
       require_once 'funcoes.php';

       tratar_erros();   
    
    ?>


    <form action="verificar.php" method="post">

        <p>
            <label for="usuario">Usuário:</label><br>
            <input type="text" name="usuario" id="usuario">
        </p>

        <p>
            <label for="senha">Senha:</label><br>
            <input type="password" name="senha" id="senha">
        </p>

        <button type="submit" class="btn btn-success">Login</button>
        <a href="cadastro_usuario.php" class="btn btn-dark" >Cadastrar</a>

    </form>

</body>
</html>