<?php 

function test($callback){
	//Processo Lento
	$callback();

}
test(function(){

	echo "Terminou";

});
?>