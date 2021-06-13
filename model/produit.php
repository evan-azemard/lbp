<?php


/*pour généré les catégories des articles*/
function  article_produit($model)
{

    $bdd =  db_connect();

    $sel = $bdd->prepare('select * from articles  WHERE marque_model = ?');
    $sel->execute(array($model));
    $articles = $sel->fetchAll();

    return $articles;
}

function  recup_id_commende()
{

    $bdd =  db_connect();

    $sel = $bdd->prepare('select id_produit from commendes');
    $sel->execute();
    $rec = $sel->fetchAll();

    return $rec;
}


function delette($id){
    $bdd =  db_connect();
    $del = $bdd->prepare('DELETE from articles WHERE id_produit = ?');
    $del->execute(array($id));
}
/*Sélédctionner 1 fois la marque*/
function  article_model()
{

    $bdd =  db_connect();
    $sel = $bdd->prepare('select DISTINCT marque_model from articles ');
    $sel->execute();
    $articles_model = $sel->fetchAll();
    return $articles_model;
}


function  ajout_panier($id_user, $id_produit, $prix)
{

    $bdd =  db_connect();
    $date = date('Y-m-d H:i:s');

    $sse = $bdd->prepare("INSERT INTO paniers (id_user,id_produit,date_panier,prix_panier,id_panier) VALUES (?,?,?,?,?) ");
    $sse->execute(array($id_user, $id_produit, $date, $prix, $id_user));
}

function cherche_logo_produit($id){
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