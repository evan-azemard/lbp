<?php

class Search
{

	private $id;
	private $categorie;
	private $db;

	public function __construct($db)
	{

		$this->db = $db;
	}

	public function getSearch($recherche)
	{

		$connexion_db = $this->db->connectDb();

		$q = $connexion_db->prepare("SELECT * FROM articles WHERE categorie LIKE '%$recherche%'");
		$q->execute();
		$search_results = $q->fetchAll(PDO::FETCH_ASSOC);

		$search = null;

		if (!empty($search_results[0])) {

			foreach ($search_results as $r) {

				$search .= "<a href='element.php?id=" . $r['id_produit'] . "'><p class='element'>" . $r['categorie'] . "</p></a><br/>";
			}

			return $search;
		} else {

			return '<p class="resultNull">Aucun résultat</p>';
		}
	}

	public function autoCompletion($recherche)
	{

		$connexion_db = $this->db->connectDb();

		// la requete mysql
		$q = $connexion_db->prepare("SELECT * FROM articles WHERE categorie LIKE '%$recherche%' LIMIT 5");
		$q->execute();
		$search_results = $q->fetchAll(PDO::FETCH_ASSOC);

		$search = null;

		if (!empty($search_results[0])) {

			foreach ($search_results as $r) {

				$search .= "<a href='recherche.php?search=" . $r['categorie'] . "'><p class='result'>" . $r['categorie'] . "</p></a><br/>";
			}

			return $search;
		} else {

			return '<p class="resultNull">Aucun résultat</p>';
		}
	}

	public function getRequestInfo($id)
	{

		$connexion_db = $this->db->connectDb();
		$q = $connexion_db->prepare("SELECT * FROM articles WHERE id_produit = $id ");
		$q->execute();
		$search_results = $q->fetch(PDO::FETCH_ASSOC);

		if (!empty($search_results)) {

			return $search_results;
		} else {
			echo 'Pas de résultat';
		}
	}
}
