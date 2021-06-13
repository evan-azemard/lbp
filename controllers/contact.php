<?php
require('model/contact.php');

function contact(){

    class C_contact
    {
        private $id_produit;
        private $com;





        public function getId_produit()
        {
            return $this->id_produit;
        }

        public function setId_produit($id_produit)
        {
            $this->id_produit = $id_produit;
        }
        public function getCom()
        {
            return $this->com;
        }

        public function setCom($com)
        {
            $this->com = $com;
        }

        public  function logoA(){
            $rec = cherche_logo_CONT($_SESSION['id']);
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


        public function contactF($id_produit,$com)
        {
            $this->setId_produit($id_produit);
            $this->setCom($com);
            $errors = array();

            (int)$id_vendeur = trouveid($this->id_produit);


            foreach ($id_vendeur as $key){

                $id = $key['id_vendeur'];

                $val = issertmessage($this->id_produit,$_SESSION['id'],$id,$this->com);

                if ($val = true){
                    ?><script>alert("Message envoyé")</script>
                    <?php

                    ?> <script>window.location.replace("accueil");</script><?php


                }

            }






        }

    }

    //Template
    $template = 'contact';
    //Layout (contient header , footer)
    include('view/layout.php');
}
