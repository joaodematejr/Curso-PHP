<?php
//Data atual	
$dt = new Datetime();
//Quantidade de Visitar Exemplo 365
$quantidadeDeVisitas = new DateInterval("P365D");
//DAta atual
echo $dt->format("d/m/y H:i:s");
//Recupera o valor da quantidade e soma coma data 
$dt->add($quantidadeDeVisitas);

echo "<br>";
// Exibi na tela
echo $dt->format("d/m/y H:i:s");

?>