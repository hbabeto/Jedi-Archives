<?php
require_once("../classe/Db.class.php");
require_once("../classe/Usuario.php");

$db = new Db();
$db->conectar();
$db->setTabela("usuarios");

$usuario = new Usuario();
$usuario->setCpf($_REQUEST['cpf']);
$usuario->setNome($_REQUEST['nome']);
$usuario->setCelular($_REQUEST['celular']);
$usuario->setEmail($_REQUEST['email']);
$usuario->setLogin($_REQUEST['login']);
$usuario->setSenha(md5($_REQUEST['senha']));
$usuario->gravar($db);

header("Location:../index.php" );

?>