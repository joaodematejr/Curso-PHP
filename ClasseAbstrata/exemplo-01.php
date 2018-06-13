<?php 

interface Veiculo{

	public function acelerar($velocidade);
	public function frenar($velocidade);
	public function trocarMarchar($marcha);
}

abstract class Automovel implements Veiculo {
	public function acelerar($velocidade){

		echo "O Veiculo Acelerou até " . $velocidade . "KM/H";
	}
	public function frenar($velocidade){
		echo "O Veiculo Frenou até " . $velocidade . "KM/H";
	}
	public function trocarMarchar($marcha){
		echo "O Veiculo Engatou a Marcha " . $marcha;
	}


}

class DelRey extends Automovel {
	public function empurrar(){

	}

}

$carro = new DelRey();
$carro->acelerar(200);


?>