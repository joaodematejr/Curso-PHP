<?php

class Pessoa{

	public $nome;//Atributo

	public function falar(){//Método

		return "O meu nome é ".$this->nome;

	}

}

$Joao = new Pessoa();
$Joao->nome = "João";
echo $Joao->falar();


?>