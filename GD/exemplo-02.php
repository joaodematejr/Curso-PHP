<?php

$image = imagecreatefromjpeg("certificado.jpg");

$titleColor = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 100, 100, 100);

imagestring($image, 5, 450, 150, "CERTIFICADO", $titleColor);
imagestring($image, 5, 440, 350, utf8_decode("João Dematé"), $titleColor);
imagestring($image, 3, 440, 370, utf8_decode("Concluido em : ") . date("d/m/Y"), $titleColor);

header("Content-type: image/jpeg");

imagejpeg($image, "certificado-" . date("Y-m-D") . ".jpg", 10);

imagedestroy($image);
