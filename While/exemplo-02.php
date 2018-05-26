<?php

$valorTotal = 150;
$desconto = 0.9;

do {

  $valorTotal *= $desconto;

}while ($valorTotal > 100);

echo $valorTotal;

?>
