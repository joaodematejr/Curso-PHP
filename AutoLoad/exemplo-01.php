<?php 

function __autoLoad($nomeClasse){

	require_once("$nomeClasse.php");


}

$carro = new DelRey();

$carro->acelerar(80);
?>