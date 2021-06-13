<?php
require('model/historique_commende.php');

function historique_commende(){

    class  C_historique_commende{

        public function  historiquecommende_f(){
            $recup = historiquecommende($_SESSION['id']);
            return $recup;
        }
    }














        //Template
    $template = 'historique_commende';
    //Layout (contient header , footer)
    include('view/layout.php');
}
