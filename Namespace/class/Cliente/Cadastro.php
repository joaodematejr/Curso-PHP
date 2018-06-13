<?php  

namespace Cliente;

class Cadastro extends \Cadastro{

	public function registrarVenda(){

		echo "Foi Registrada uma venda para o cliente ".$this->getNome();

	}
}

?>