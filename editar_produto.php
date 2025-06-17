<?php 
require_once 'cadeado.php';
require_once 'conexao.php';
require_once 'funcoes.php';

$conn = conectar_banco();

$id_usuario = $_SESSION['id'];

// Se o formulário ainda não foi enviado, mostra o formulário com os dados do produto
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (!isset($_GET['id_produto'])) {
        header('location:home.php?code=0');
        exit;
    }

    $id_produto = (int)$_GET['id_produto'];

    // Busca o produto do usuário no banco
    $sql = "SELECT nome, preco, quantidade FROM tb_produtos WHERE id_produto = ? AND usuario_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        exit("Erro na preparação da consulta.");
    }
    mysqli_stmt_bind_param($stmt, "ii", $id_produto, $id_usuario);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $nome, $preco, $quantidade);
    if (!mysqli_stmt_fetch($stmt)) {
        header('location:home.php?code=3');
        exit;
    }
    mysqli_stmt_close($stmt);

    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Editar Produto</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="container">
        <h1>Editar Produto</h1>
        <form action="editar_produto.php" method="post">
            <input type="hidden" name="id_produto" value="<?= htmlspecialchars($id_produto) ?>" />
            
            <p>
                <label for="nome">Nome:</label><br>
                <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($nome) ?>" required />
            </p>
            <p>
                <label for="preco">Preço:</label><br>
                <input type="text" name="preco" id="preco" value="<?= htmlspecialchars(number_format($preco, 2, ',', '')) ?>" required />
            </p>
            <p>
                <label for="quantidade">Quantidade:</label><br>
                <input type="number" name="quantidade" id="quantidade" value="<?= htmlspecialchars($quantidade) ?>" min="0" required />
            </p>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="home.php" class="btn btn-dark">Cancelar</a>
        </form>
    </body>
    </html>
    <?php

} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processa a atualização do produto

    // Validações básicas
    if (empty($_POST['id_produto']) || empty($_POST['nome']) || empty($_POST['preco']) || !isset($_POST['quantidade'])) {
        header('location:home.php?code=2');
        exit;
    }

    $id_produto = (int)$_POST['id_produto'];
    $nome = $_POST['nome'];
    $preco = str_replace(',', '.', $_POST['preco']);
    $preco = floatval($preco);
    $quantidade = (int)$_POST['quantidade'];

    if ($preco <= 0 || $quantidade < 0) {
        header('location:home.php?code=4');
        exit;
    }

    // Atualiza no banco, garantindo que só altere produto do usuário logado
    $sql = "UPDATE tb_produtos SET nome = ?, preco = ?, quantidade = ? WHERE id_produto = ? AND usuario_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        header('location:home.php?code=3');
        exit;
    }
    mysqli_stmt_bind_param($stmt, "sdiii", $nome, $preco, $quantidade, $id_produto, $id_usuario);

    if (!mysqli_stmt_execute($stmt)) {
        header('location:home.php?code=3');
        exit;
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header('location:home.php');
    exit;
}
?>
