<?php  

$file = fopen("log.txt", "a+");

fwrite($file, date("y-m-d H:i:s")."\r\n");

fclose($file);

echo "Arquivo criado com Sucesso";

?>