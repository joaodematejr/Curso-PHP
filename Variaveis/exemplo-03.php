<?php

$anoNascimento = 1993;

//$nomeCompleto = "João Dematé";
//Comentario //Variavel com  número
$nome = "João";
$sobreNome = "Dematé";

$nomeCompleto = $nome ." ". $sobreNome;

echo $nomeCompleto;

//echo $nome;
exit;
//var_dump($nome);

echo "<br>";

unset($nomeCompleto);

if (isset($nomeCompleto)) {
	echo $nomeCompleto;
}



?>