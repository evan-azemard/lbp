<?php
$arr = array();

$hpass = password_hash($_POST['password'], PASSWORD_DEFAULT);


$password_required = preg_match('%^(?=[^A-Z]*+.)(?=[^a-z]*+.)(?=[^0-9]*+.)(?=[^\W]*+.)%', $_POST['password']);

if (!$password_required) {

    echo "preg";
    array_push($arr,"preg");
}

$mail = (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
if (!$mail) {
    echo "mail";
    array_push($arr,"mail");
}

if (count($arr) < 1){
    echo $hpass;
}


require ('../config/database.php');

//Enregistre users
                $pseudo =$_POST['pseudo'];
                $password = $_POST['password'];
                $tel = $_POST['tel'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $prenom = $_POST['prenom'];
                $nom = $_POST['nom'];
                $adresse = $_POST['adresse'];
                $choix = $_POST['rank'];

function RegisterA($pseudo, $hpass, $tel, $email, $age, $prenom, $nom, $adresse)
{
    $time = date('Y-m-d H:i:s');
    $bdd =  db_connect();
    $rank = 1;
    $sql = $bdd->prepare("INSERT INTO users (pseudo, password, tel, email, age, prenom, nom, adresse, rank,registration_date) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
    $sql->execute(array($pseudo, $hpass, $tel, $email, $age, $prenom, $nom, $adresse, $rank, $time));
}


//Enregistre sellers
function RegisterB($pseudo, $hpass, $tel, $email, $age, $prenom, $nom, $adresse)
{
    $time = date('Y-m-d H:i:s');
    $bdd =  db_connect();
    $rank = 2;
    $sql = $bdd->prepare("INSERT INTO users (pseudo, password, tel, email, age, prenom, nom, adresse, rank,registration_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->execute(array($pseudo, $hpass, $tel, $email, $age, $prenom, $nom, $adresse, $rank, $time));
}


/*Pour vérifier que le pseudo n'est pas dèjà pris */
function selectusers()
{
    $bdd =  db_connect();

    $sel1 = $bdd->prepare("SELECT * FROM users ");
    $sel1->execute();
    $sel = $sel1->fetchAll();
    return $sel;
}
/*sellers*/
function selectsellers()
{
    $bdd =  db_connect();

    $sel1 = $bdd->prepare("SELECT * FROM users ");
    $sel1->execute();
    $selle = $sel1->fetchAll();
    return $selle;
}

            if ($choix == 1 && $choix !== 2)
            {
                RegisterA($pseudo, $hpass, $tel, $email, $age, $prenom, $nom, $adresse);
                ?> <script>window.location.replace("login.php");</script><?php
                    /*2 = sellers*/
            }
            else if ($choix == 2 && $choix !== 1)
            {
                RegisterB($pseudo, $hpass, $tel, $email, $age, $prenom, $nom, $adresse);
                ?> <script>window.location.replace("login.php");</script><?php
            }


?>