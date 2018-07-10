<?php
//Valor da Multa
$multaPorAtraso = 90;

$td = strtotime("2018-07-01");

echo "<br><br>";

if (date("d/m/Y") > date("d/m/Y", $td)) {
    echo "Atrasado";
    echo "<br>";
    $diasAtrasados = date("d") - date("d", $td);
    echo "Quantidades de dias atrasados " . $diasAtrasados;
    echo "<br>";
    echo "Multa por dias de atrasado " . $multaPorAtraso . " Reais";
    $totalDoAtraso = $multaPorAtraso * $diasAtrasados;
    echo "<br>";
    echo "Seu carro atrasou " . $diasAtrasados . " dias o valor a ser cobrado pela multa de atraso é " . $totalDoAtraso . " Reais";
} else if (date("d/m/Y") == date("d/m/Y", $td)) {
    echo "Vence hoje";
} else {
    echo "Em dia";
}
