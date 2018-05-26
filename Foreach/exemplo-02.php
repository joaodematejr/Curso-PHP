<!DOCTYPE html>
<html lang="pt" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <form>
    <input type="text" name="nome">
    <input type="date" name="nascimento">
    <input type="submit" name="Enviar">
  </form>
</body>
</html>
<?php

if (isset($_GET)) {
  foreach ($_GET as $key => $value) {

    echo "Nome do campo " .$key."<br />";
    echo "Valor do campo " .$value."";
    echo "<hr />";
  }
}

?>
