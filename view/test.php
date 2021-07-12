<?php
require('../config/database.php');

if (isset($_POST['data'])){

    $bdd =  db_connect();
    $sse = $bdd->prepare("INSERT INTO new (champs) VALUES (?) ");
    $sse->execute(array($_POST['data']));

    $ok = $_POST['data'];

};





?>