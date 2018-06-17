<?php 

require_once("config.php");

$root = new Usuario();

$root->loadbyId(5);

echo $root;

?>