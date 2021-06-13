<?php

function historiquecommende($data){

    $bdd =  db_connect();
    $sel = $bdd->prepare('SELECT  * from commendes WHERE id_user = ? ');
    $sel->execute(array($data));
    $recup = $sel->fetchAll();
    return $recup;
}