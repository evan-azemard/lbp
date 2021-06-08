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

                    header("Location: accueil");

                }

            }






        }

    }

    //Template
    $template = 'contact';
    //Layout (contient header , footer)
    include('view/layout.php');
}
