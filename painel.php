<?php
session_start();
include('verifica.php');
//print_r($_SESSION['usuario']);
?>
<h2><?php echo $_SESSION['usuario'];?></h2>

<a href='logaut.php'>Sair</a>