<?php

function trouveid($data)
{
    $bdd =  db_connect();
    $sql = $bdd->prepare("SELECT id_vendeur FROM articles WHERE id_produit = ? ");
    $sql->execute(array($data));
    $id_vendeur = $sql->fetchAll();
    return $id_vendeur;
}

function issertmessage($data1,$data2,$data3,$data4)
{
    $bdd =  db_connect();
    $sql = $bdd->prepare("INSERT INTO contacts (id_produit, id_user, id_vendeur, message) VALUES (?, ?, ?, ?)");
    $sql->execute(array($data1,$data2,$data3,$data4));

    return true;
}

?>