<?php require_once 'cadeado.php';

    require_once 'funcoes.php';

    if(form_nao_enviado()){
        header('location:home.php?code=0');
        exit;
    }

    if(produto_em_branco()) {
        header('location:home.php?code=2');
        exit;
    }

    $nome  = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $id = $_SESSION['id'];

    $preco = str_replace(',', '.', $preco);
    $preco = floatval($preco);

    require_once 'conexao.php';

    $conn = conectar_banco();

    $sql = "INSERT INTO tb_produtos (nome, preco, quantidade, usuario_id) 
            VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        header('location:home.php?code=3');
        exit;
    }

    if(!mysqli_stmt_bind_param($stmt, "sdii", $nome, $preco, $quantidade, $id)){
        header('location:home.php?code=3');
        exit;
    }

    if(!mysqli_stmt_execute($stmt)) {
        header('location:home.php?code=3');
        exit;
    }

    header('location:home.php');
?>