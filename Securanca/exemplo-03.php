<?php

$pasta = "arquivos";
$permissao = "0775";

if (!is_dir($pasta, $permissao)) {
    mkdir($pasta);
}

echo "Pasta Criada com Sucesso !";
