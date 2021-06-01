<?php


/*Plus tard pour les produit phare*/
function  article_accueil()
{

        $bdd =  db_connect();

    $sel = $bdd->prepare("select * from articles");
    $sel->execute();
    $articles = $sel->fetchAll();

    return $articles;
}