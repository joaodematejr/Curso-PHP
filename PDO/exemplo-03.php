<?php  

$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");

$stmt = $conn->prepare("INSERT INTO tb_usuario (deslogin, dessenha) VALUES (:LOGIN,:PASSWORD)");

$login = "João";
$password = "123";

$stmt->bindParam(":LOGIN", $login);
$stmt->bindParam(":PASSWORD", $password);

$stmt->execute();

echo "Salvo com Sucesso";
?>