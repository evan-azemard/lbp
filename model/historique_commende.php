<?php
require ('../config/database.php');

function historiquecommende($data){

    $bdd =  db_connect();
    $sel = $bdd->prepare('SELECT  * from commendes WHERE id_user = ? ');
    $sel->execute(array($data));
    $recup = $sel->fetchAll();
    return $recup;
}

function cherche_logo_histo($id){
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