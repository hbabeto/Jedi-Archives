<?php
require_once("../CLASSE/Db.class.php");
require_once("../CLASSE/Usuario.php");

$db = new Db();
$db->conectar();
$db->setTabela("usuarios");

$campos = "senha, login"; 
$usuario = new Usuario(); 
$usuario->setLogin($_REQUEST['login']);
$usuario->setSenha(md5($_REQUEST['senha']));

$where = "login = '" . $usuario->getLogin() . "' AND senha = '" . $usuario->getSenha() . "'";

$dados = consultarDados($db, $campos, $where, $usuario);

if ($dados) {
    header("Location:../HTML/telaPrinc.html" );
} else {
    $error_message = "Usuário ou senha incorretos.";
    header("Location:../index.php?error=" . urlencode($error_message));
}

function consultarDados($db, $campos, $where, $usu)
{
    return $usu->consultar($db, $campos, $where);
}
?>
