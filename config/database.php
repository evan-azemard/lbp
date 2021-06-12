<?php

/*
 * Config Bdd
 */
function db_connect()
{
	$servname = "localhost"; $dbname = "lbp"; $user = "root"; $pass = "";
	try{
	$bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user , $pass);
 	}
	catch(PDOException $e){
    	echo "Erreur : " . $e->getMessage();
    }
	return $bdd;
}






