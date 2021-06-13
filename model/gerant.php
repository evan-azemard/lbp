<?php
function ajoutadmin($data){
    $bdd =  db_connect();
    $sql = $bdd->prepare("UPDATE users SET   rank = 3  WHERE id_user = ?");
    $sql->execute(array($data));
}

function selectadmin(){
    $bdd =  db_connect();

    $sql = $bdd->prepare("SELECT * FROM `users` WHERE rank = 3");
    $sql->execute();
    $sel = $sql->fetchAll();
    return $sel;
}

function selectuser(){
    $bdd =  db_connect();

    $sql = $bdd->prepare("SELECT * FROM `users` WHERE rank = 1");
    $sql->execute();
    $sel = $sql->fetchAll();
    return $sel;
}

function selall(){
    $bdd =  db_connect();

    $sql = $bdd->prepare("SELECT * FROM `users`");
    $sql->execute();
    $sel = $sql->fetchAll();
    return $sel;
}

function deladmin($data){
    $bdd =  db_connect();
    $sql = $bdd->prepare("UPDATE  users SET rank = 1 WHERE id_user = ? and rank = 3");
    $sql->execute(array($data));
}

function verif_id($data){
    $bdd =  db_connect();

    $sql = $bdd->prepare("SELECT rank FROM `users` WHERE id_user = ?");
    $sql->execute(array($data));
    $sel = $sql->fetch();
    return $sel;
}

function delall($data){
    $bdd =  db_connect();

    $sql = $bdd->prepare("DELETE FROM users  WHERE id_user = ?");
    $sql->execute(array($data));
    $sel = $sql->fetch();
    return $sel;
}

function cherche_logo_ger($id){
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