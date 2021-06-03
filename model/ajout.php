<?php

/*Pour ajouter un produit*/

function ajouter(
    $imgname,
    $imgsize,
    $imgtype,
    $imgtmp,
    $resum,
    $categorie,
    $code,
    $nom,
    $marque,
    $prix,
    $iduser
) {
    $time = date('Y-m-d H:i:s');

    $bdd = db_connect();

    $sql = $bdd->prepare("
    INSERT INTO 
    articles 
    (
    resum,
    categorie,
    date_ajout,
    code,
    nom_model,
    marque_model,
    prix_article,
    nom_img,
    taille_img,
    type_img,
    bin_img,
    id_vendeur
    ) 
    
    VALUES (:resum, :categorie, :date_ajout, :code, :nom_model, :marque_model, :prix_article, :nom_img,
    :taille_img, :type_img, :bin_img, :id_vendeur)
    ");
    $sql->execute(array(
        ':resum' => $resum,
        ':categorie' => $categorie,
        ':date_ajout' => $time,
        ':code' => $code,
        ':nom_model' => $nom,
        ':marque_model' => $marque,
        ':prix_article' => $prix,
        ':nom_img' => $imgname,
        ':taille_img' => $imgsize,
        ':type_img' => $imgtype,
        ':bin_img' => $imgtmp,
        ':id_vendeur' => $iduser
    ));
}
