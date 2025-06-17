<?php require_once 'funcoes.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvar Usuário</title>
</head>
<body class="container-fluid">

    <h1>Salvar Usuário</h1>

    <p>
        <a href="index.php">Voltar à home</a>
    </p>

    <?php 
        if (form_nao_enviado()) {
            exit("<h3>Por favor, retorne à home e preencha o formulário.</h3>");
        }

        if (usuario_campos_em_branco($_POST)) {
            exit("<h3>Por favor, preencha todos os campos do formulário!</h3>");
        }


        require_once 'conexao.php';

        $usuario  = $_POST['usuario'];
        $senha  = $_POST['senha'];
        $email = $_POST['email'];

        $conn = conectar_banco();

        $sql = "INSERT INTO tb_usuarios (usuario, senha, email) 
                VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        if (!$stmt) {
            exit("Erro na preparação da consulta.");
        }

        mysqli_stmt_bind_param($stmt, "sss", $usuario, $senha, $email);

        if (mysqli_stmt_execute($stmt)) {
            echo "<h3>Usuário cadastrado com sucesso!</h3>";
        } else {
            echo "<h3>Error ao salvar: " . mysqli_stmt_error($stmt) . "</h3>";
        }


        mysqli_close($conn);
    

    ?>
    
</body>
</html>