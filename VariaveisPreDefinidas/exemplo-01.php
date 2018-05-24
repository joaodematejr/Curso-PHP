<?php 

$nome = (int)$_GET["a"];

//var_dump($nome);

//PEGAR IP DO USUARIO
$ip = $_SERVER["REMOTE_ADDR"];

//echo $ip;

//Pegar Nome do arquivo
$nomeScript = $_SERVER["SCRIPT_NAME"];

echo $nomeScript;
?>