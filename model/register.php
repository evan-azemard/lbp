<?php

//Enregistre users
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
