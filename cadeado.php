<?php session_start();
if (!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])){
    header('location:index.php?code=0');
}
?>