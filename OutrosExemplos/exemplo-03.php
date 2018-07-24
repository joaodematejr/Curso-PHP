<?php
//Data atual
$dt = new Datetime();
//Quantidade de Dias Atrasados
$quantidadesDeDiasAtrsados = new DateInterval("P23D");
//Data atual
echo "Data Atual ";
echo $dt->format("d/m/y H:i:s");
//Recupera o valor da quantidade e soma coma data
$dt->add($quantidadesDeDiasAtrsados);

echo "<br>";
// Exibi na tela
echo "Data que foi Entregue ";
echo $dt->format("d/m/y H:i:s");
echo "<br>";

