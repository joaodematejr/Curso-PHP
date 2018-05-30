<?php 

function ola ($texto = "Mundo", $periodo = "Bom dia"){

	return "Olá $texto! $periodo!<br>";

}

echo ola("Mundo","Bom dia");
echo ola("","Boa Noite");
echo ola("João", "Boa Tarde");
echo ola("Junior","");

?>