<?php

$nome = "João";

function teste(){

	global $nome;
	echo $nome;

}

function teste2(){

	$nome = "João";
	echo $nome. "Agora no Teste 2";

}

teste();
teste2();
?>