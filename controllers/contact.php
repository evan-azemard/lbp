<?php
require('model/contact.php');

function contact(){

    class C_contact
    {
        private $id_vendeur;
        private $id_produit;



        public function getId_vendeur()
        {
            return $this->id_vendeur;
        }

        public function setId_vendeur($id_vendeur)
        {
            $this->id_vendeur = $id_vendeur;
        }

        public function getId_produit()
        {
            return $this->id_produit;
        }

        public function setId_produit($id_produit)
        {
            $this->id_produit = $id_produit;
        }

        public function contactF($id_produit, $id_vendeur)
        {
            $this->setId_produit($id_produit);
            $this->setId_vendeur($id_vendeur);
            $errors = array();





        }

    }

        //Template
    $template = 'contact';
    //Layout (contient header , footer)
    include('view/layout.php');
}
