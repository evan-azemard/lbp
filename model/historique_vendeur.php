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