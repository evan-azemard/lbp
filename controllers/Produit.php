<?php

/*Pour la page qui affiche les produits trié*/
require('model/produit.php');
require('library/fonctions.php');

function produit()
{

    /*
     *  Si il n'y a pas de nom d'article correspondant au nom_model,
     *  Alors on crée un nouvelle article avec le nom model
     *  on selectione les champs qui correspond au nom de l'article
     * Selectionner tout les nom de model
     * Les afficher
     *
     * */

    class C_produit
    {

        private $id;
        private $prix;

        public function getId()
        {
            return $this->id;
        }
        public function setId($id)
        {
            $this->id = $id;
        }
        public function getPrix()
        {
            return $this->prix;
        }
        public function setPrix($prix)
        {
            $this->prix = $prix;
        }


        public function produit($id, $prix)
        {
            $this->setId($id);
            $this->setPrix($prix);
            $errors = array();



            if (count($errors) < 1) {

                $prixf = (int)$prix;
                $id_user = (int)$_SESSION['id'];
                $id_article = (int)$this->id;

                ajout_panier($id_user, $id_article, $prixf);

                unset($prixf);

                header("refresh: 1");

                unset($prixf);

                header("refresh: 1");
            }
        }
    }



    $articles_model = article_model();

    //Template
    $template = 'produit';
    //Layout (contient header , footer)
    include('view/layout.php');
}
