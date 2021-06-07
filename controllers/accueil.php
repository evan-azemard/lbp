<?php
require('model/accueil.php');

//Plus tard pour afficher les produit phare sur l'accueil
function accueil()
{

    $articles = article_accueil();


    //Template
    $template = 'accueil';
    //Layout (contient header , footer)
    include('view/layout.php');
}
