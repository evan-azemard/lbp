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

function deladmin($data){
    $bdd =  db_connect();

    $sql = $bdd->prepare("DELETE FROM users  WHERE id_user = ? and rank = 3");
    $sql->execute(array($data));
}

