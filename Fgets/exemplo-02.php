<?php  
$filename = "logo.png";//ARQUIVO PNG
$base64 = base64_encode(file_get_contents($filename));// CONVERTER ARQUIVO PARA base64
$fileinfo = new finfo(FILEINFO_MIME_TYPE);
$mimetype = $fileinfo->file($filename);
$base64encode = "data:".$mimetype.";base64,". $base64;

?>

<a href="<?=$base64encode?>" target="_blank">Link para Imagem</a> 

<img src="<?=$base64encode?>"><!--EXIBIR ARQUIVO VINDO DE BASE 64 -->