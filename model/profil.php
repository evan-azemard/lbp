<?php

//Update users
function UpdateA($pseudo, $hpass, $tel, $email, $age, $prenom, $nom, $adresse)
{
    $bdd =  db_connect();
    $sql = $bdd->prepare("UPDATE users SET pseudo= ?, password = ? , tel = ? , email = ? , age = ? , prenom = ? , nom = ? , adresse = ? WHERE id_user = ?");
    $sql->execute(array($pseudo, $hpass, $tel, $email, $age, $prenom, $nom, $adresse,  $_SESSION["id"]));
}


//Update sellers
function UpdateB($pseudo, $hpass, $tel, $email, $age, $prenom, $nom, $adresse)
{
    $bdd =  db_connect();
    $sql = $bdd->prepare("UPDATE sellers SET pseudo= ?, password = ? , tel = ? , email = ? , age = ? , prenom = ? , nom = ? , adresse = ? WHERE id_user = ?");
    $sql->execute(array($pseudo, $hpass, $tel, $email, $age, $prenom, $nom, $adresse,  $_SESSION["id"]));
}


//Update users
function UpdateAA($pseudo,  $tel, $email, $age, $prenom, $nom, $adresse)
{
    $bdd =  db_connect();
    $sql = $bdd->prepare("UPDATE users SET pseudo= ?, tel = ? , email = ? , age = ? , prenom = ? , nom = ? , adresse = ? WHERE id_user = ?");
    $sql->execute(array($pseudo, $tel, $email, $age, $prenom, $nom, $adresse,  $_SESSION["id"]));
}


//Update sellers
function UpdateBB($pseudo, $tel, $email, $age, $prenom, $nom, $adresse)
{
    $bdd =  db_connect();
    $sql = $bdd->prepare("UPDATE sellers SET pseudo= ? , tel = ? , email = ? , age = ? , prenom = ? , nom = ? , adresse = ? WHERE id_user = ?");
    $sql->execute(array($pseudo, $tel, $email, $age, $prenom, $nom, $adresse,  $_SESSION["id"]));
}


/*Pour vérifier que le pseudo n'est pas dèjà pris */
function select()
{
    $bdd =  db_connect();

    $sel1 = $bdd->prepare("SELECT * FROM users WHERE id_user != ? ");
    $sel1->execute(array($_SESSION["id"]));
    $sel = $sel1->fetchAll();
    return $sel;
}
/*sellers*/
function select2()
{
    $bdd =  db_connect();

    $sel1 = $bdd->prepare("SELECT * FROM sellers WHERE id_user != ?");
    $sel1->execute(array($_SESSION["id"]));
    $selle = $sel1->fetchAll();
    return $selle;
}
