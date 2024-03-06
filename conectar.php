<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
	
    $db = "bd_pj";
    $tb = "tbl_pj";

    try {             
       $conx = new PDO("mysql:host=$host;dbname=$db", $user, $pass);  
       $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch(PDOException $e) {
       echo "Falha na conexão com o DB:<br />" . $e->getMessage();
    }  
?>
