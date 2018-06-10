<?php 

interface Veiculo{

	public function acelerar($velocidade);
	public function frenar($velocidade);
	public function trocarMarchar($marcha);
}

class Civic implements Veiculo {
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

$carro = new Civic();

$carro->trocarMarchar(1);

?>