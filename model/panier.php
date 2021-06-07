<?php
function  article_panier($model)
{

    $bdd =  db_connect();

    $sel = $bdd->prepare('select id_panier from paniers  WHERE id_user = ?');
    $sel->execute(array($model));
    $articles = $sel->fetch();
    return $articles;
}

function  article_pp($id)
{
    $bdd =  db_connect();
    $sel = $bdd->prepare('select id_produit from paniers  WHERE id_panier = ? ');
    $sel->execute(array($id));
    $articles_pp = $sel->fetchAll();
    return $articles_pp;
}

/*Sélédctionner 1 fois la marque*/
function  select_all($data)
{
    $bdd =  db_connect();
    $sel = $bdd->prepare('select * from articles WHERE id_produit = ? ');
    $sel->execute(array($data));
    $select_all = $sel->fetchAll();
    return $select_all;
}

function d_panier($data1,$data2){
    $bdd =  db_connect();
    $del = $bdd->prepare('DELETE from paniers WHERE id_produit = ? and id_user = ?');
    $del->execute(array($data1,$data2));
}
