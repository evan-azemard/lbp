<?php
require('model/historique_vendeur.php');

function historique_vendeur(){



    class C_historique_vendeur{

        private  $prix;
        private  $valeur;

        public function getPrix()
        {
            return $this->prix;
        }
        public function getValeur()
        {
            return $this->valeur;
        }

        public function setValeur($valeur)
        {
            $this->valeur = $valeur;
        }
        public function setPrix($prix)
        {
            $this->prix = $prix;
        }

        public function selecthistorique_vendeur(){

            $sel = historiquesel($_SESSION['id']);
            return $sel;
        }

        public function modifhistorique_vendeur($prix,$valeur){
            $this->setPrix($prix);
            $this->setValeur($valeur);

            if (isset($this->prix)){
                modifhistorique_vendeur($this->prix,$this->valeur,$_SESSION['id']);

                header("refresh: 1");

            }


        }

    }


    //Template
    $template = 'historique_vendeur';
    //Layout (contient header , footer)
    include('view/layout.php');
}
