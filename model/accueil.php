<?php


/*Plus tard pour les produit phare*/
function  article_accueil()
{

    $bdd =  db_connect();

    $sel = $bdd->prepare("SELECT * FROM articles ORDER BY date_ajout DESC LIMIT 3");
    $sel->execute();
    $articles = $sel->fetchAll();

    return $articles;
}
