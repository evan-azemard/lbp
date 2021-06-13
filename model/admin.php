<?php

function seladm(){
    $bdd =  db_connect();
    $sql = $bdd->prepare("SELECT * FROM contacts WHERE id_user = 0 ");
    $sql->execute();
    $admin = $sql->fetchAll();

    return $admin;
}

function deletempadmin($data){
    $bdd =  db_connect();
    $sql = $bdd->prepare("DELETE  FROM contacts WHERE id_produit = ? ");
    $sql->execute(array($data));


}

function cherche_logo_Ad($id){
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