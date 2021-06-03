<?php
require ('model/panier.php');
function panier(){

    class C_affiche
    {

        private $id;

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }



        public function affiche_panier($id)
        {
            $this->setId($id);

            /*l'id du pannier de l'utilisateur*/
            $articles =  article_panier($this->id);



            /*selectionne les id produit du panier*/

            $articles_pp = article_pp($articles['id_panier']);


                foreach ($articles_pp as $item)
                {
                    $select_all = select_all($item['id_produit']);

                    foreach ($select_all as $key)
                    {
                        return $key;
                    }

                }
        }
    }

//Template
    $template = 'panier';
//Layout (contient header , footer)
    include('view/layout.php');
}

 /* ob_start();
                        ob_clean();
                        render
                        extends*/
?>