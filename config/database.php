<?php

function db_connect()
{

require "./pass.php";


	try{
	$bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user , $pass);
 	}
	catch(PDOException $e){
    	echo "Erreur : " . $e->getMessage();
    }
	return $bdd;
}






