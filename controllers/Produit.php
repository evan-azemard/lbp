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

        public function  redelette(){
            $rec = recup_id_commende();

            foreach ($rec as $rere){
                delette((int)$rere['id_produit']);

            }

        }

        public  function logoA(){
            $rec = cherche_logo_produit($_SESSION['id']);
            if ($rec === false){
                var_dump("null");
            }
            if ($rec === true)
            {
                var_dump("true");

                ?>
                <style>
                    #header_panier{
                        color: rgba(255, 0, 55, 0.58) !important;
                    }
                </style>
                <?php
            }

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

                ?><meta http-equiv="refresh" content="0"><?php

                unset($prixf);

                ?><meta http-equiv="refresh" content="0"><?php
            }
        }

        public function  validerV($data1,$data2){

            $articles_model = article_modelValue($data1,$data2);
            return$articles_model;
        }

        public function  valider()
        {
            $articles_model = article_model();
            return$articles_model;

        }

    }



    //Template
    $template = 'produit';
    //Layout (contient header , footer)
    include('view/layout.php');
}
