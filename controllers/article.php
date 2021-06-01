<?php
//Afficher un article prècis en fonction de son id
require ('model/article.php');

function article()
{
    class C_article
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

        public function article($id)
        {
            $this->setId($id);
            $errors = array();



            $articles = article_info($this->id);

                        $_SESSION['marque']  = $articles['marque_model'];
                        $_SESSION['nom']  = $articles['nom_model'];
                        $_SESSION['resum']  = $articles['resum'];
                        $_SESSION['description'] = $articles['description'];
                        $_SESSION['systeme'] = $articles['systeme'];
                        $_SESSION['interface_utilisateur'] = $articles['interface_utilisateur'];
                        $_SESSION['ratio'] = $articles['ratio'];
                        $_SESSION['luminosite'] = $articles['luminosite'];
                        $_SESSION['puce_graphique'] = $articles['puce_graphique'];
                        $_SESSION['ram'] = $articles['ram'];
                        $_SESSION['memoire_flash'] = $articles['memoire_flash'];
                        $_SESSION['dast'] = $articles['dast'];
                        $_SESSION['double_sim'] = $articles['double_sim'];
                        $_SESSION['taile'] = $articles['taile'];
                        $_SESSION['type_ecran'] = $articles['type_ecran'];
                        $_SESSION['definition_ecran'] = $articles['definition_ecran'];
                        $_SESSION['resolution_ecran	'] = $articles['resolution_ecran'];
                        $_SESSION['batterie'] = $articles['batterie'];
                        $_SESSION['nb_capteur'] = $articles['nb_capteur'];
                        $_SESSION['id_vendeur'] = $articles['id_vendeur'];
                        $_SESSION['taile_gravure'] = $articles['taile_gravure'];
                        $_SESSION['nb_stock'] = $articles['nb_stock'];
                        $_SESSION['nom_model'] = $articles['nom_model'];
                        $_SESSION['marque_model'] = $articles['marque_model'];
                        $_SESSION['prix_article'] = $articles['prix_article'];
                        $_SESSION['dastr'] = $articles['dastr'];
                        $_SESSION['dasm'] = $articles['dasm'];
                        $_SESSION['nom_img'] = $articles['nom_img'];
                        $_SESSION['taille_img'] = $articles['taille_img'];
                        $_SESSION['type_img'] = $articles['type_img'];
                        $_SESSION['bin_img'] = $articles['bin_img'];

                        $vendeur = article_vendeur_info($_SESSION['id_vendeur']);

                $_SESSION['nom_vendeur'] = $vendeur['nom'];

        }
    }

    //Template
    $template = 'article';
    //Layout (contient header , footer)
    include('view/layout.php');
}