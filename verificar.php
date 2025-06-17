<?php require_once 'funcoes.php';

    if (form_nao_enviado()) {
        header('location:index.php?code=0');
        exit;
    }

    if (form_em_branco()) { 
        header('location:index.php?code=2');
        exit;
    }

    $usuario   = $_POST['usuario'];
    $senha     = $_POST['senha'];

    require_once 'conexao.php';

    $conn = conectar_banco();

    $query = "SELECT * FROM tb_usuarios WHERE usuario = ? AND senha = ?";

    $stmt = mysqli_prepare($conn, $query);

    if(!$stmt) {
        header('location:index.php?code=3');
        exit;
    }

    mysqli_stmt_bind_param($stmt, 'ss', $usuario, $senha);
    
    if (!mysqli_execute($stmt)){
        header('location:index.php?code=4');
        exit;
    }

    mysqli_stmt_store_result($stmt);

    $linhas = mysqli_stmt_num_rows($stmt);

    if ($linhas <= 0) {
        header('location:index.php?code=1'); 
        exit;
    }

    mysqli_stmt_bind_result($stmt, $id, $usuario, $senha, $email); 

    mysqli_stmt_fetch($stmt); 
    
    session_start();
    $_SESSION['id']      = $id;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['senha']   = $senha;
    $_SESSION['email']   = $email;

    header('location:home.php');

?>