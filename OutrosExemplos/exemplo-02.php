
<?php  
$url = file_get_contents('https://www.battlefield.com/pt-br/');
preg_match_all('/ORES-->(.+)<!--/s', $url, $conteudo);
$exibir = $conteudo[0][0];
?>

