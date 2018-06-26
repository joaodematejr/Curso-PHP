<?php  

$file = fopen("teste.txt", "w+");// GERAR NOVO ARQUIVO

fclose($file);

unlink("teste.txt");//REMOVER ARQUIVO

echo "Arquivo removido com Sucesso";

?>