<?php 

require_once("config.php");

//CaRREGA UM USUARIO
//$root = new Usuario();
//$root->loadbyId(5);
//echo $root;

//CARREGA UMA LISTA DE USUARIOS
//$lista = Usuario::getList();
//echo json_encode($lista);

//CARREGA UMA LISTA DE USUARIOS BUSCANDO PELO LOGIN
//$search = Usuario::search("jo");
//echo json_encode($search);

//CARREGANDO USUARIO USANDO LOGIN E SENHA
//$usuario = new Usuario();
//$usuario->login("root", "root");
//echo $usuario;

//CRIANDO NOVO USUARIO
//$aluno = new Usuario("aluno", "@lun0");
//$aluno->insert();
//echo $aluno;


//ATUALIZANDO USUARIO NO BANCO
$usuario = new Usuario();
$usuario->loadbyId(13);
$usuario->update("professor","senha_professor");

echo $usuario;

echo "Atualizado com Sucesso !";

?>