<?php

function historiquesel($data){

    $bdd =  db_connect();
    $sel = $bdd->prepare('SELECT  * from articles WHERE id_vendeur = ? ');
    $sel->execute(array($data));
    $select_all = $sel->fetchAll();
    return $select_all;
}