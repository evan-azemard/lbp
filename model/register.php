<!-- Enregistre users -->

<?php
$stmt = new PDO("mysql:host=localhost;dbname=lbp", "root", "");

if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["password"])) {

    if (!empty($stmt->query("SELECT * FROM users WHERE email = '" . $_POST["email"] . "'")->fetch())) {
        echo "errMail";
    } else {
        if ($stmt->query("INSERT INTO `users`(`ID`, `nom`, `prenom`, `email`, `password`)
							VALUES (NULL, '" . $_POST["nom"] . "', '" . $_POST["prenom"] . "', '" . $_POST["email"] . "',
							'" . password_hash($_POST["password"], PASSWORD_BCRYPT) . "')")) {
            echo "success";
        } else {
            echo "err";
        }
    }
} else {
    echo "err";
}


//Enregistre sellers
function RegisterB($pseudo, $hpass, $tel, $email, $age, $prenom, $nom, $adresse)
{
    $time = date('Y-m-d H:i:s');
    $bdd =  db_connect();
    $rank = 2;
    $sql = $bdd->prepare("INSERT INTO sellers (pseudo, password, tel, email, age, prenom, nom, adresse, rank,registration_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
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

    $sel1 = $bdd->prepare("SELECT * FROM sellers ");
    $sel1->execute();
    $selle = $sel1->fetchAll();
    return $selle;
}
