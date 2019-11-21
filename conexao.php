<?php
define( 'host', '127.0.0.1');
define('user','root');
define('senha','');
define('db','login');

$conexao = mysqli_connect(host,user,senha,db) or die ('Nao foi possivel conectar ao banco');