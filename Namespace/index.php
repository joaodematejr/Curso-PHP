<?php  

require_once("config.php");

use Cliente\Cadastro;



$cad = new Cadastro();

$cad->setNome("João Dematé");
$cad->setEmail("joaodematejr@gmail.com");
$cad->setSenha("123");

$cad->registrarVenda();


?>