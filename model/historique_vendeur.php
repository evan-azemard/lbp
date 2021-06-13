<?php

function historiquesel($data){

    $bdd =  db_connect();
    $sel = $bdd->prepare('SELECT  * from articles WHERE id_vendeur = ? ');
    $sel->execute(array($data));
    $select_all = $sel->fetchAll();
    return $select_all;
}

function modifhistorique_vendeur($data, $data2, $data3){
    $bdd =  db_connect();
    $sql = $bdd->prepare("UPDATE  articles SET prix_article = ? WHERE id_produit = ? and id_vendeur = ?");
    $sql->execute(array($data, $data2, $data3));
}

function supphistorique_vendeur($data1,$data2)
{

    $bdd = db_connect();
    $sql = $bdd->prepare("DELETE FROM articles  WHERE id_produit = ? and id_vendeur = ? ");
    $sql->execute(array($data1, $data2));
}

function cherche_logo_histov($id){
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