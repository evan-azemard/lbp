<?php
function  article_panier($model)
{

    $bdd =  db_connect();

    $sel = $bdd->prepare('select id_panier from paniers  WHERE id_user = ?');
    $sel->execute(array($model));
    $articles = $sel->fetchColumn();

    return $articles;


}

function  article_pp($id)
{

    $bdd =  db_connect();

    $sel = $bdd->prepare('select id_produit  from paniers REPLICATE  WHERE id_panier = ? ');
    $sel->execute(array($id));
    $articles_pp = $sel->fetchColumn();
/*    var_dump($articles_pp);*/
    return $articles_pp;
}

/*Sélédctionner 1 fois la marque*/
function  select_all($data)
{
    $bdd =  db_connect();
    $sel = $bdd->prepare('select * from articles INNER JOIN paniers ON ? = articles.id_produit  ');
    $sel->execute(array($data));
    $select_all = $sel->fetch();
    return $select_all;
}

