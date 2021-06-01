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
        private $number;
        public function getId()
        {
            return $this->id;
        }
        public function setId($id)
        {
            $this->id = $id;
        }

        public function getNumber()
        {
            return $this->number;
        }
        public function setNumber($number)
        {
            $this->number = $number;
        }

        public function produit($id, $number)
        {
            $this->setNumber($number);
            $this->setId($id);
            $errors = array();





            if ($this->id < 1 || $this->id > 50) {
                array_push($errors, "Vous pouvez sélectioner au maximum 50 même produit");
            }

            if (count($errors) < 1) {

                $data_article = data_article($this->id);

                foreach ($data_article as $item) {
                    $prix = $item['prix_article'];
                }


                $prixf = (int)$prix * (int)$this->number;
                $id_user = (int)$_SESSION['id'];
                $id_article = (int)$this->id;
                $number_article = (int)$this->number;

                ajout_panier($id_user, $id_article, $number_article, $prixf);

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
