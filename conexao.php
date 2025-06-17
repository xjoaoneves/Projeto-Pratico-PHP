<?php 
function conectar_banco() {

    $servidor   = 'localhost:3306';
    $usuario    = 'root';
    $senha      = '';
    $banco      = 'bd_cadastro';   
    
    $conn = mysqli_connect($servidor, $usuario, $senha, $banco);

    if (!$conn) {
        exit("Erro na conexão: " . mysqli_connect_error());
    }

    return $conn;
}

?>