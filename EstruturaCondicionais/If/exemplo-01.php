<?php

$qualASuaIdade = 125;

$idadeCrianca = 12;
$idadeMaior = 18;
$idadeMelhor = 65;

if ($qualASuaIdade < $idadeCrianca) {

	echo "Criança";

}else if ($qualASuaIdade < $idadeMaior) {

	echo "Adolecente";

} elseif ($qualASuaIdade < $idadeMelhor) {
	
	echo "Adulto";

}else{

	echo "Idoso";

}

echo "<br>";

echo ($qualASuaIdade < $idadeMaior)? "Menor de idade":"Maior de idade";

?>