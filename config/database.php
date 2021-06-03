<?php

/*
 * Config Bdd
 */
function db_connect()
{
	$servname = "localhost";
	$dbname = "boutique";
	$user = "root";
	$pass = "";
	try {
		$bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
	} catch (PDOException $e) {
		echo "Erreur : " . $e->getMessage();
	}
	return $bdd;
}
