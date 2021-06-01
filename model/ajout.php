<?php

/*Pour ajouter un produit*/

function ajouter(
    $imgname,
    $imgsize,
    $imgtype,
    $imgtmp,
    $resum,
    $description,
    $systeme,
    $interface_utilisateur,
    $ratio,
    $luminosite,
    $puce_graphique,
    $ram,
    $memoire_flash,
    $dast,
    $dastr,
    $dasm,
    $double_sim,
    $taille,
    $type_ecran,
    $definition_ecran,
    $batterie,
    $nb_capteur,
    $taile_gravure,
    $nom,
    $marque,
    $number,
    $prix,
    $iduser,
    $resolution_ecran
) {
    $time = date('Y-m-d H:i:s');

    $bdd = db_connect();

    $sql = $bdd->prepare("
    INSERT INTO 
    articles (resum,description,date_ajout,systeme,interface_utilisateur,ratio,luminosite,puce_graphique,ram,
    memoire_flash,dast,double_sim,taile,type_ecran,definition_ecran,batterie,nb_capteur
    ,taile_gravure,nb_stock,nom_model,marque_model,prix_article,dastr,dasm,nom_img,taille_img,type_img,bin_img,id_vendeur,resolution_ecran) 
    
    VALUES (:resum, :description, :date_ajout, :systeme, :interface_utilisateur,:ratio, :luminosite, :puce_graphique,
    :ram, :memoire_flash, :dast, :double_sim, :taile, :type_ecran, :definition_ecran, :batterie, 
    :nb_capteur, :taile_gravure, :nb_stock, :nom_model, :marque_model, :prix_article, :dastr, :dasm, :nom_img,
    :taille_img, :type_img, :bin_img, :id_vendeur, :resolution_ecran)
    ");
    $sql->execute(array(
        ':resum' => $resum,
        ':description' => $description,
        ':date_ajout' => $time,
        ':systeme' => $systeme,
        'interface_utilisateur' => $interface_utilisateur,
        ':ratio' => $ratio,
        ':luminosite' => $luminosite,
        ':puce_graphique' => $puce_graphique,
        ':ram' => $ram,
        ':memoire_flash' => $memoire_flash,
        ':dast' => $dast,
        ':double_sim' => $double_sim,
        ':taile' => $taille,
        ':type_ecran' => $type_ecran,
        ':definition_ecran' => $definition_ecran,
        ':batterie' => $batterie,
        ':nb_capteur' => $nb_capteur,
        ':taile_gravure' => $taile_gravure,
        ':nb_stock' => $number,
        ':nom_model' => $nom,
        ':marque_model' => $marque,
        ':prix_article' => $prix,
        ':dastr' => $dastr,
        ':dasm' => $dasm,
        ':nom_img' => $imgname,
        ':taille_img' => $imgsize,
        ':type_img' => $imgtype,
        ':bin_img' => $imgtmp,
        ':id_vendeur' => $iduser,
        ':resolution_ecran' => $resolution_ecran
    ));
}
