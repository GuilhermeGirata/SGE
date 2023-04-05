<?php
	try{ //tente
		$fusca = new PDO("mysql:host=localhost;dbname=u277754222_t23_guilherme","u277754222_t23_guilherme","t23_Guilherme_123");
		//echo "Conexão efetuada com sucesso";
	} 
	catch(PDOException $e){ //Bloco correspondente ao try	
		// verificar var_dump($e);
		// verificar método echo $e->getCode(); 
		echo $e->getMessage(); //método amplamente utilizado		
	}
?>