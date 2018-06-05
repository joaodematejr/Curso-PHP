<?php 

function soma(int ...$valores):float{

	return array_sum($valores);

}

echo var_dump(soma(2,2));
echo "<br>";
echo soma(99,100);
echo "<br>";
echo soma(1.5,3.2);
echo "<br>";

?>