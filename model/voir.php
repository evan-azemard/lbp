<?php

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
    $sql = $bdd->prepare("SELECT * FROM sellers WHERE id_user = ? ");
    $sql->execute(array($id));
    $selusers = $sql->fetch();

    return $selusers;
}