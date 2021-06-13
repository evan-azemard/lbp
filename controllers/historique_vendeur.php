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


         public  function logoA(){
            $rec = cherche_logo_histov($_SESSION['id']);
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

                ?> <meta http-equiv="refresh" content="1"><?php

            }
        }

        public function supphistorique_vendeur($valeur){

            $this->setValeur($valeur);


           supphistorique_vendeur($this->valeur,$_SESSION['id']);


                 ?>  <meta http-equiv="refresh" content="0"><?php



        }

    }


    //Template
    $template = 'historique_vendeur';
    //Layout (contient header , footer)
    include('view/layout.php');
}
