<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	
	$db = "bd_pj";
    $tb = "tbl_pj";

	try {             
		$conx = new PDO("mysql:host=$host", $user, $pass);  
		$conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	}
	catch(PDOException $e) {
		echo "Falha de conexão:<br />" . $e->getMessage();
	}  

	if($conx){
		try {	  
			$criadb = "CREATE DATABASE $db";
			$conx->exec($criadb);
		}
		catch(PDOException $e) {
			echo $criadb . "Falha na criação do DB:<br />" . $e->getMessage();
		}
	}

	try {             
		$conx = new PDO("mysql:host=$host;dbname=$db", $user, $pass);  
		$conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	}
	catch(PDOException $e) {
		echo "Falha na criação do DB:<br />" . $e->getMessage();
	} 

	if($conx){
		try {	
			$criatb = "CREATE TABLE $db.$tb (
			id_cliente INT(6)      UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			nome        VARCHAR(50)  NOT NULL,
			email       VARCHAR(50)  NOT NULL,
			cpf 		VARCHAR(11)  NOT NULL,
			cep 		INT(8)		 NOT NULL,
			telefone    BIGINT       NOT NULL,
			senha		VARCHAR(80)  NOT NULL,
			data_reg   TIMESTAMP)
			ENGINE=InnoDB DEFAULT CHARSET=latin1";     

			$conx->exec($criatb); 
		}      
		catch(PDOException $e) { 
			echo $criatb ."Falha Tabela:<br>". $e->getMessage();
		}
	}
	
	$conx = null;  
?>
