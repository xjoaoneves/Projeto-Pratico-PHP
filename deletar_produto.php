<?php require_once 'cadeado.php';

    if (!isset($_GET['id_produto'])) {
        header('location:home.php?code=0');
        exit;
    }

    $id_produto = (int)$_GET['id_produto']; 
    require_once 'conexao.php';

    $conn = conectar_banco();

    $id_usuario = $_SESSION['id']; 


    $sql = "DELETE FROM tb_produtos WHERE id_produto = $id_produto AND
            usuario_id = $id_usuario";

    mysqli_query($conn, $sql);

    $linhas = mysqli_affected_rows($conn);

    if ($linhas <= 0) {
        header('location:home.php?code=3');
        exit;
    }

    header('location:home.php');   

?>