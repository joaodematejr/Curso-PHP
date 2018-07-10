<?php
$hoje = new DateTime();

echo $hoje->format("d/m/Y");

$entrega = new DateTime('2018-07-10');
echo "<br><br>";
var_dump($entrega);
echo "<br><br>";
var_dump($hoje = new DateTime());
echo "<br><br>";

echo "<br><br>";

if ($hoje > $entrega) {
echo "Atrasado";
echo "<br><br>";
$interval = $hoje->diff($entrega);
echo "$interval->d dias";

} else if ($hoje == $entrega) {
echo "Vence hoje";
} else {
echo "Em dia";
}
