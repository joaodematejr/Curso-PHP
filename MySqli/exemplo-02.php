<?php  

$conn = new mysqli ("localhost","root", "", "dbphp7");

if ($conn->connect_error) {

	echo "Erro ou conectar ao Banco de dados ". $conn->connect_error;

}

$result = $conn->query("SELECT * FROM tb_usuario ORDER BY deslogin");

$data = array();

while($row = $result->fetch_array(MYSQLI_ASSOC)){

	array_push($data, $row);
	
}

echo json_encode($data);

?>