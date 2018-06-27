<?php  

$link = "https://www.google.com/logos/doodles/2018/world-cup-2018-day-13-4949947639136256-5655608640405504-ssw.png";

$content = file_get_contents($link);

$parce = parse_url($link);

$basename = basename($parce["path"]);

$file = fopen($basename, "w+");

fwrite($file, $content);//ESCREVE NO SISTEMA

fclose($file);

?>

<img src="<?=$basename?>">