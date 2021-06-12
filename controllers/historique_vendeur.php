<?php
require('model/historique_vendeur.php');

function historique_vendeur(){


    class C_historique_vendeur{

        public function selecthistorique_vendeur(){

             $sel = historiquesel($_SESSION['id']);
             return $sel;
        }



    }


        //Template
    $template = 'historique_vendeur';
    //Layout (contient header , footer)
    include('view/layout.php');
}
