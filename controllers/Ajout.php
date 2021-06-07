<?php
/*Ajouter un produuit*/
require('model/ajout.php');

function ajout()
{

    class C_Ajout
    {
        private $imgname;
        private $imgsize;
        private $imgtype;
        private $imgtmp;
        private $resum;
        private $categorie;
        private $code;
        private $nom;
        private $marque;
        private $prix;
        private $iduser;

        public function getImgname()
        {
            return $this->imgname;
        }
        public function getImgsize()
        {
            return $this->imgsize;
        }
        public function getImgtmp()
        {
            return $this->imgtmp;
        }
        public function getImgtype()
        {
            return $this->imgtype;
        }
        public function getResum()
        {
            return $this->resum;
        }
        public function getCategorie()
        {
            return $this->categorie;
        }
        public function getCode()
        {
            return $this->code;
        }
        public function getNom()
        {
            return $this->nom;
        }
        public function getMarque()
        {
            return $this->marque;
        }
        public function getPrix()
        {
            return $this->prix;
        }
        public function getIduser()
        {
            return $this->iduser;
        }




        public function setResum($resum)
        {
            $this->resum = $resum;
        }
        public function setCategorie($categorie)
        {
            $this->categorie = $categorie;
        }
        public function setCode($code)
        {
            $this->code = $code;
        }

        public function setNom($nom)
        {
            $this->nom = $nom;
        }
        public function setMarque($marque)
        {
            $this->marque = $marque;
        }
        public function setPrix($prix)
        {
            $this->prix = $prix;
        }
        public function setImgname($imgname)
        {
            $this->imgname = $imgname;
        }
        public function setImgsize($imgsize)
        {
            $this->imgsize = $imgsize;
        }
        public function setImgtype($imgtype)
        {
            $this->imgtype = $imgtype;
        }
        public function setImgtmp($imgtmp)
        {
            $this->imgtmp = $imgtmp;
        }
        public function setIduser($iduser)
        {
            $this->iduser = $iduser;
        }


        public function ajouter($imgname, $imgsize, $imgtype, $imgtmp, $resum, $categorie, $code, $nom, $marque, $prix, $iduser)
        {
            $this->setImgname($imgname);
            $this->setImgsize($imgsize);
            $this->setImgtype($imgtype);
            $this->setImgtmp($imgtmp);
            $this->setResum($resum);
            $this->setCategorie($categorie);
            $this->setCode($code);
            $this->setNom($nom);
            $this->setMarque($marque);
            $this->setPrix($prix);
            $this->setIduser($iduser);
            $errors = array();
            $size = 650000;

            if ($_SESSION['rank'] = 2) {
                if ($this->imgsize > $size) {
                    array_push($errors, "Le poid de l'image est trop grand.(maximum = 650 ko)");
                }
                if (strlen($this->resum) < 20) {
                    array_push($errors, "Le résumé est trop court");
                }
                if (strlen($this->resum) > 220) {
                    array_push($errors, "Le résumé est trop long");
                }
                if (strlen($this->categorie) < 1) {
                    array_push($errors, "La catégorie est trop courte");
                }
                if (strlen($this->categorie) > 25) {
                    array_push($errors, "La catégorie est trop longue");
                }
                if (strlen($this->code) != 5) {
                    array_push($errors, "Le code postale doit faire 5 chiffres: $this->code");
                }
                if (strlen($this->nom) < 3) {
                    array_push($errors, "La nom du modèle est trop petit: $this->nom");
                }
                if (strlen($this->nom) > 25) {
                    array_push($errors, "La nom  du modèle est trop grand: $this->nom");
                }
                if (strlen($this->marque) < 1) {
                    array_push($errors, "La nom de la marque est trop petite :$this->marque");
                }
                if (strlen($this->marque) > 40) {
                    array_push($errors, "La nom de la marque est trop grand:$this->marque");
                }
                if ($this->prix < 1) {
                    array_push($errors, "La prix est trop petit: $this->prix");
                }
                if ($this->prix > 50000) {
                    array_push($errors, "La prix est trop grand: $this->prix");
                }
            } else {
                array_push($errors, "Vous n'êtes pas re-vendeur");
            }

            if (count($errors) < 1) {
                ajouter(
                    $this->imgname,
                    $this->imgsize,
                    $this->imgtype,
                    $this->imgtmp,
                    $this->resum,
                    $this->categorie,
                    $this->code,
                    $this->nom,
                    $this->marque,
                    $this->prix,
                    $this->iduser
                );

                header('Location: accueil');
            } else {
                return $errors;
            }
        }
    }



    //Template
    $template = 'ajout';
    //Layout (contient header , footer)
    include('view/layout.php');
}
