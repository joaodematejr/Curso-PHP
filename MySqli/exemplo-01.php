<?php  

$conn = new mysqli ("localhost","root", "", "dbphp7");

if ($conn->connect_error) {
	echo "Erro ou conectar ao Banco de dados ". $conn->connect_error;
	}

$stml = $conn->prepare("INSERT INTO tb_usuario (deslogin, dessenha) VALUES(?, ?)");
$stml->bind_param("ss", $login, $pass);

$login  = "user";
$pass = "123456";

$stml->execute();
?>