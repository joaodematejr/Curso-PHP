<?php  

$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");

$stmt = $conn->prepare("DELETE FROM tb_usuario WHERE idusuario = :ID");

$id = "1";

$stmt->bindParam(":ID", $id);
$stmt->execute();

echo "Deletado com Sucesso";
?>