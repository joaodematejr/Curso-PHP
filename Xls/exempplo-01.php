<form method="post">
<input type="text" name="busca"></input>
<button type"submit">Enviar</button>
</form>

<?php
$_POST['busca'] = '<h1>Teste</h1><h1>Teste 1</h1><h1>Teste 2</h1>';
if (isset($_POST["busca"])) {
    //echo strip_tags($_POST['busca']);
    echo htmlentities($_POST['busca']);
}
?>