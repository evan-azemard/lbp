<?php

function seladm(){
    $bdd =  db_connect();
    $sql = $bdd->prepare("SELECT * FROM contacts WHERE id_user = 0 ");
    $sql->execute();
    $admin = $sql->fetchAll();

    return $admin;
}