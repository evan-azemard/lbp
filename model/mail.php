<?php
require ('../config/database.php');

function selcont($id){
    $bdd =  db_connect();
    $sql = $bdd->prepare("SELECT * FROM contacts WHERE id_vendeur = ? ");
    $sql->execute(array($id));
    $sels = $sql->fetchAll();

    return $sels;
}

function selproduit($id){
    $bdd =  db_connect();
    $sql = $bdd->prepare("SELECT * FROM articles WHERE id_produit = ? ");
    $sql->execute(array($id));
    $relproduit = $sql->fetchAll();

    return $relproduit;
}

function seluser($id){
    $bdd =  db_connect();
    $sql = $bdd->prepare("SELECT * FROM users WHERE id_user = ? ");
    $sql->execute(array($id));
    $selusers = $sql->fetch();

    return $selusers;
}

function supp_voir_mp($id){
    $bdd =  db_connect();
    $del = $bdd->prepare('DELETE from contacts WHERE id = ?');
    $del->execute(array($id,));
}

function cherche_logo_voir($id){
     $bdd =  db_connect();

    $sel = $bdd->prepare('select * from paniers WHERE id_user = ?');
    $sel->execute(array($id));
    $rec = $sel->fetchAll();

    if ($rec){
        return true;
    }else{
        return false;
    }
}