<?php 

	require 'config.php';

	// var_dump($_POST['search']);

	if(!empty($_POST['search'])){


		// Récupère la recherche
		$recherche = isset($_POST['search']) ? $_POST['search'] : '';

		$data = $search->autoCompletion($recherche);

		echo $data;


	}
	else{

		echo 'remplir le champs'; 

	}
