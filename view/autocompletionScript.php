<?php 



// session_start();

class Database
{
    private $db_host;
    private $db_login;
    private $db_password;
    private $db_name;
    public $PDO;


    public function __construct()
    {
        $this->db_host = "localhost";
        $this->db_login = "root";
        $this->db_password = "";
        $this->db_name = "lbp";
    }


    public function connectDb()
    {
        try {
            $this->PDO = new PDO("mysql:host=$this->db_host;dbname=$this->db_name;charset=utf8", $this->db_login, $this->db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            return $this->PDO;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}


$db = new Database();



class Search
{

	private $id;
	private $categorie;
	private $db;

	public function __construct($db)
	{

		$this->db = $db;
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

				$search .= "<a href='element.php?search=" . $r['categorie'] . "'><p class='result'>" . $r['categorie'] . "</p></a><br/>";
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

$search = new Search($db);




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


?>