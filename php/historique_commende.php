<?php
require('../model/historique_commende.php');



    class  C_historique_commende{

         public  function logoA(){
            $rec = cherche_logo_histo($_SESSION['id']);
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

        public function  historiquecommende_f(){
            $recup = historiquecommende($_SESSION['id']);
            return $recup;
        }
    }
