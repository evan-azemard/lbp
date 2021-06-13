<?php
function  article_panier($model)
{

    $bdd =  db_connect();

    $sel = $bdd->prepare('SELECT  id_panier from paniers  WHERE id_user = ?');
    $sel->execute(array($model));
    $articles = $sel->fetch();
    return $articles;
}

function  article_pp($id)
{
    $bdd =  db_connect();
    $sel = $bdd->prepare('SELECT  id_produit from paniers  WHERE id_panier = ? ');
    $sel->execute(array($id));
    $articles_pp = $sel->fetchAll();
    return $articles_pp;
}

function  article_prix($id)
{
    $bdd =  db_connect();
    $sel = $bdd->prepare('SELECT  SUM(prix_panier) as prix_total FROM paniers  WHERE id_panier = ? ');
    $sel->execute(array($id));
    $prix = $sel->fetch();
    return $prix;
}

/*Sélédctionner 1 fois la marque*/
function  select_all($data)
{
    $bdd =  db_connect();
    $sel = $bdd->prepare('SELECT  * from articles WHERE id_produit = ? ');
    $sel->execute(array($data));
    $select_all = $sel->fetchAll();
    return $select_all;
}

function d_panier($data1,$data2){
    $bdd =  db_connect();
    $del = $bdd->prepare('DELETE from paniers WHERE id_produit = ? and id_user = ?');
    $del->execute(array($data1,$data2));
}

function envoiepanier($id_produit,$id_user,$nom_model,$resum,$prix,$nom_user,$nom_sellers,$id_sellers,$id_panier,$nom_img,$taille_img,$type_img,$bin_img){
    $time = date('Y-m-d H:i:s');
    $bdd =  db_connect();
    $sql = $bdd->prepare("INSERT INTO commendes ( date_commende, id_user, id_produit, nom_article, resum_article, prix_article, nom_user, nom_seller, id_seller, id_panier, nom_img, taille_img, type_img, bin_img) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->execute(array( $time, $id_user,$id_produit,$nom_model,$resum,$prix,$nom_user,$nom_sellers,$id_sellers,$id_panier,$nom_img,$taille_img,$type_img,$bin_img));
}

function trouveidsel($data){
    $bdd =  db_connect();
    $sel = $bdd->prepare('SELECT  id_vendeur from articles WHERE id_produit = ? ');
    $sel->execute(array($data));
    $infos = $sel->fetchall();
    return $infos;
}

function infosellers($data){
    $bdd =  db_connect();
    $sel = $bdd->prepare('SELECT  * from users WHERE id_user = ? ');
    $sel->execute(array($data));
    $info = $sel->fetchall();
    return $info;
}

 function delete_panier_article($id_panier,$id_user){
    $bdd =  db_connect();
    $del = $bdd->prepare('DELETE from paniers WHERE id_panier = ? and id_user = ?');
    $del->execute(array($id_panier, $id_user));
}

function select_commende($id){
    $bdd =  db_connect();
    $sel = $bdd->prepare('SELECT  id_produit from commendes WHERE id_user = ? ');
    $sel->execute(array($id));
    $commendes = $sel->fetchall();
    return $commendes;
}

function supp_art($id){
    $bdd =  db_connect();
    $del = $bdd->prepare('DELETE from articles WHERE id_produit = ?');
    $del->execute(array($id,));
}

function cherche_logo_pan($id){
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