<?php 

require_once("config.php");

//Carregar um usuário
//$root = new Usuario();
//$root->loadbyId(5);
//echo $root;

//Carrega uma lista de usuarios
//$lista = Usuario::getList();
//echo json_encode($lista);

//Carrega um lista de usuarios buscando pelo login
//$search = Usuario::search("jo");
//echo json_encode($search);

//Carrega um usuario usando login e senha
//$usuario = new Usuario();
//$usuario->login("root", "root");
//echo $usuario;

//Criando um novo usuário
$aluno = new Usuario("aluno", "@lun0");
$aluno->insert();
echo $aluno;

?>