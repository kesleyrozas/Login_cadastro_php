<?php
session_start();
include('conexao.php');

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$query = "select count(*) as total from usuario where nome = '$nome'";
$result = mysqli_query($conexao, $query);
$queryresult = mysqli_fetch_assoc($result);

if($queryresult['total'] == 1){
    $_SESSION['usuario_existe'] = true;
    header('Location: cadastro.php');
    exit();
}else{
    $query = "insert into usuario (nome,usuario,senha,data) values ('$nome','$usuario','$senha', NOW())";
    if($conexao->query($query) === TRUE){
        $_SESSION['nome'] = $queryresult['nome'];
        $_SESSION['insert_efetuado'] = true;
    }
    $conexao->close;
    header('Location: cadastro.php');
    exit();

}