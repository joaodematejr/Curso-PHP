<?php

header("Content-Type: image/png");

$img = imagecreate(512, 512);

$black = imagecolorallocate($img, 0, 0, 0);
$red = imagecolorallocate($img, 255, 0, 0);

imagestring($img, 5, 206, 206, "Curso PHP 7", $red);

imagepng($img);

imagedestroy($img);
