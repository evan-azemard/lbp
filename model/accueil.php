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



function  ajout_panierA($id_user, $id_produit, $prix)
{

    $bdd =  db_connect();
    $date = date('Y-m-d H:i:s');

    $sse = $bdd->prepare("INSERT INTO paniers (id_user,id_produit,date_panier,prix_panier,id_panier) VALUES (?,?,?,?,?) ");
    $sse->execute(array($id_user, $id_produit, $date, $prix, $id_user));
}


function  savid($data, $email, $mp)
{

    $bdd =  db_connect();

    $sse = $bdd->prepare("INSERT INTO contacts (id_produit,email,message) VALUES (?,?,?) ");
    $sse->execute(array($data, $email, $mp));
}

function  sav($email, $mp)
{
    $bdd = db_connect();

    $sse = $bdd->prepare("INSERT INTO contacts (email,message) VALUES (?,?) ");
    $sse->execute(array($email, $mp));
}

function  recup_id_commendeA()
{

    $bdd =  db_connect();

    $sel = $bdd->prepare('select id_produit from commendes');
    $sel->execute();
    $rec = $sel->fetchAll();

    return $rec;
}


function cherche_logo_A($id){
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


function deletteA($id){
    $bdd =  db_connect();
    $del = $bdd->prepare('DELETE from articles WHERE id_produit = ?');
    $del->execute(array($id));
}
