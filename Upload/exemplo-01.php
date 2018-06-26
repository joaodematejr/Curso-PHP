<!DOCTYPE html>
<html>
<head>
	<title>PHP</title>
</head>
<body>
	<form method="POST" enctype="multipart/form-data">

		<input type="file" name="fileUpload">

		<button type="submit">Send</button>

	</form>
</body>
</html>

<?php  

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$file = $_FILES["fileUpload"];
	if ($file["error"]) {
		throw new Exception("Error:" .$file["error"]);
		
	}
	$dirUploads = "uploads";
	if (!is_dir($dirUploads)) {
		mkdir($dirUploads);

	}

	if(move_uploaded_file($file["tmp_name"], $dirUploads . DIRECTORY_SEPARATOR. $file["name"])){

		echo "Upload Realizado com Sucesso!";

	}else{
		
		throw new Exception("Não foi Possivel Realizar o Upload.");
		
	}

}



?>