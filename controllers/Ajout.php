<?php

/*Ajouter un produuit*/
require ('model/ajout.php');

function ajout()
{

    class C_Ajout
    {
        private $imgname;
        private $imgsize;
        private $imgtype;
        private $imgtmp;
        private $resum;
        private $description;
        private $systeme;
        private $interface_utilisateur;
        private $ratio;
        private $luminosite;
        private $puce_graphique;
        private $ram;
        private $memoire_flash;
        private $dast;
        private $dastr;
        private $dasm;
        private $double_sim;
        private $taille;
        private $type_ecran;
        private $definition_ecran;
        private $batterie;
        private $nb_capteur;
        private $taile_gravure;
        private $nom;
        private $marque;
        private $number;
        private $prix;
        private $iduser;
        private $resolution_ecran;

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
        public function getDescription()
        {
            return $this->description;
        }
        public function getSysteme()
        {
            return $this->systeme;
        }
        public function getInterface_utilisateur()
        {
            return $this->interface_utilisateur;
        }
        public function getRatio()
        {
            return $this->ratio;
        }
        public function getLuminosite()
        {
            return $this->luminosite;
        }
        public function getPuce_graphique()
        {
            return $this->puce_graphique;
        }
        public function getRam()
        {
            return $this->ram;
        }
        public function getMemoire_flash()
        {
            return $this->memoire_flash;
        }
        public function getDast()
        {
            return $this->dast;
        }
        public function getIDastr()
        {
            return $this->dastr;
        }
        public function getDasm()
        {
            return $this->dasm;
        }
        public function getDouble_sim()
        {
            return $this->double_sim;
        }
        public function getTaille()
        {
            return $this->taille;
        }
        public function getType_ecran()
        {
            return $this->type_ecran;
        }
        public function getDefinition_ecran()
        {
            return $this->definition_ecran;
        }
        public function getBatterie()
        {
            return $this->batterie;
        }
        public function getNb_capteur()
        {
            return $this->nb_capteur;
        }
        public function getTaile_gravure()
        {
            return $this->taile_gravure;
        }
        public function getNom()
        {
            return $this->nom;
        }
        public function getMarque()
        {
            return $this->marque;
        }
        public function getNumber()
        {
            return $this->number;
        }
        public function getPrix()
        {
            return $this->prix;
        }
        public function getIduser()
        {
            return $this->iduser;
        }
        public function getResolution_ecran()
        {
            return $this->getResolution_ecran();
        }



        public function setResum($resum)
        {
            $this->resum = $resum;
        }
        public function setDescription($description)
        {
            $this->description = $description;
        }
        public function setSysteme($systeme)
        {
            $this->systeme = $systeme;
        }
        public function setInterface_utilisateur($interface_utilisateur)
        {
            $this->interface_utilisateur = $interface_utilisateur;
        }

        public function setRatio($ratio)
        {
            $this->ratio = $ratio;
        }
        public function setLuminosite($luminosite)
        {
            $this->luminosite = $luminosite;
        }
        public function setPuce_graphique($puce_graphique)
        {
            $this->puce_graphique = $puce_graphique;
        }
        public function setram($ram)
        {
            $this->ram = $ram;
        }
        public function setMemoire_flash($memoire_flash)
        {
            $this->memoire_flash = $memoire_flash;
        }
        public function setDast($dast)
        {
            $this->dast = $dast;
        }
        public function setDastr($dastr)
        {
            $this->dastr = $dastr;
        }
        public function setDasm($dasm)
        {
            $this->dasm = $dasm;
        }
        public function setDouble_sim($double_sim)
        {
            $this->double_sim = $double_sim;
        }
        public function setTaille($taille)
        {
            $this->taille = $taille;
        }
        public function setType_ecran($type_ecran)
        {
            $this->type_ecran = $type_ecran;
        }
        public function setDefinition_ecran($definition_ecran)
        {
            $this->definition_ecran = $definition_ecran;
        }
        public function setBatterie($batterie)
        {
            $this->batterie = $batterie;
        }
        public function setNb_capteur($nb_capteur)
        {
            $this->nb_capteur = $nb_capteur;
        }
        public function setTaile_gravure($taile_gravure)
        {
            $this->taile_gravure = $taile_gravure;
        }
        public function setNom($nom)
        {
            $this->nom = $nom;
        }
        public function setMarque($marque)
        {
            $this->marque = $marque;
        }
        public function setNumber($number)
        {
            $this->number = $number;
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
        public function setResolution_ecran($resolution_ecran)
        {
            $this->resolution_ecran = $resolution_ecran;
        }


        public function ajouter($imgname,$imgsize,$imgtype,$imgtmp,$resum,$description,$systeme,$interface_utilisateur,
                                $ratio,$luminosite,$puce_graphique,$ram,$memoire_flash,$dast,$dastr,$dasm,$double_sim,$taille,
                                $type_ecran,$definition_ecran,$batterie,$nb_capteur,$taile_gravure,$nom,$marque,$number,$prix,$iduser,$resolution_ecran)
        {
            $this->setImgname($imgname);
            $this->setImgsize($imgsize);
            $this->setImgtype($imgtype);
            $this->setImgtmp($imgtmp);
            $this->setResum($resum);
            $this->setDescription($description);
            $this->setSysteme($systeme);
            $this->setInterface_utilisateur($interface_utilisateur);
            $this->setRatio($ratio);
            $this->setLuminosite($luminosite);
            $this->setPuce_graphique($puce_graphique);
            $this->setram($ram);
            $this->setMemoire_flash($memoire_flash);
            $this->setDast($dast);
            $this->setDastr($dastr);
            $this->setDasm($dasm);
            $this->setDouble_sim($double_sim);
            $this->setTaille($taille);
            $this->setType_ecran($type_ecran);
            $this->setDefinition_ecran($definition_ecran);
            $this->setBatterie($batterie);
            $this->setNb_capteur($nb_capteur);
            $this->setTaile_gravure($taile_gravure);
            $this->setNom($nom);
            $this->setMarque($marque);
            $this->setNumber($number);
            $this->setPrix($prix);
            $this->setIduser($iduser);
            $this->setResolution_ecran($resolution_ecran);

            $errors = array();
            $size = 650000;

            if ($_SESSION['rank'] = 2)
            {
                if ($this->imgsize > $size) {
                    array_push($errors, "Le poid de l'image est trop grand.(maximum = 650 ko)");
                }
                if (strlen($this->resum) < 50) {
                    array_push($errors, "Le résumé est trop court");
                }
                if (strlen($this->resum) > 220) {
                    array_push($errors, "Le résumé est trop long");
                }
                if (strlen($this->description) < 200) {
                    array_push($errors, "La description est trop courte");
                }
                if (strlen($this->description) > 800) {
                    array_push($errors, "La description est trop longue");
                }
                if (!empty($this->systeme))
                {
                    if (strlen($this->systeme) < 3) {
                        array_push($errors, "Le nom du système est trop court:$this->systeme");
                    }
                }
                if (strlen($this->systeme) > 50) {
                    array_push($errors, "Le nom du système est trop grand:$this->systeme");
                }
                if (!empty($this->interface_utilisateur))
                {
                    if (strlen($this->interface_utilisateur) < 3) {
                        array_push($errors, "Le nom de l'interface utilisateur est trop court:$this->interface_utilisateur");
                    }
                }
                if (strlen($this->interface_utilisateur) > 50) {
                    array_push($errors, "Le nom de l'interface utilisateur est trop grand:$this->interface_utilisateur");
                }
                if (!empty($this->ratio))
                {
                    if ($this->ratio < 15) {
                        array_push($errors, "Le ratio taille écran est trop petit:$this->ratio");
                    }
                }
                if ($this->ratio > 200) {
                    array_push($errors, "Le ratio taille écran est trop grand:$this->ratio");
                }
                if ($this->luminosite < 200) {
                    array_push($errors, "La valeur de la luminosité est trop faible:$this->luminosite");
                }
                if ($this->luminosite > 1600) {
                    array_push($errors, "La valeur de la luminosité est trop grande:$this->luminosite");
                }
                if (strlen($this->puce_graphique) < 3) {
                    array_push($errors, "Le nom de la puce graphique est trop petit:$this->puce_graphique");
                }
                if (strlen($this->puce_graphique) > 40) {
                    array_push($errors, "Le nom de la puce graphique est trop grand:$this->puce_graphique");
                }
                if ($this->ram < 3) {
                    array_push($errors, "La valeur de la ram est trop faible:$this->ram");
                }
                if ($this->ram > 35) {
                    array_push($errors, "La valeur de la ram est trop grande:$this->ram");
                }
                if ($this->memoire_flash <  30) {
                    array_push($errors, "La valeur de la memoire flash est trop faible:$this->memoire_flash");
                }
                if ($this->memoire_flash > 2000) {
                    array_push($errors, "La valeur de la memoire flash est trop grande:$this->memoire_flash");
                }
                if (strlen($this->dast) < 0) {
                    array_push($errors, "La valeur du DAS tête est trop faible:$this->dast");
                }
                if (strlen($this->dast) > 4) {
                    array_push($errors, "La valeur du DAS tête est trop grande:$this->dast");
                }
                if (strlen($this->dastr) < 0) {
                    array_push($errors, "La valeur du DAS tronc est trop faible:$this->dastr");
                }
                if (strlen($this->dast) > 4) {
                    array_push($errors, "La valeur du DAS tronc est trop grande:$this->dastr");
                }
                if (strlen($this->dasm) < 0) {
                    array_push($errors, "La valeur du DAS membre est trop faible:$this->dasm");
                }
                if (strlen($this->dasm) > 7) {
                    array_push($errors, "La valeur du DAS membre est trop grande:$this->dasm");
                }
                if ($this->taille < 3.3) {
                    array_push($errors, "La taille est trop faible pour un smartphone:$this->taille");
                }
                if ($this->taille > 8.5) {
                    array_push($errors, "La taille est trop grande pour un smartphone:$this->taille");
                }
                if (strlen($this->type_ecran) < 3) {
                    array_push($errors, "Le nom du type d'écran est trop court:$this->type_ecran");
                }
                if (strlen($this->type_ecran) > 35) {
                    array_push($errors, "Le nom du type d'écran est top long:$this->type_ecran");
                }
                if (strlen($this->definition_ecran) < 2) {
                    array_push($errors, "La valeur de la définition de l'écran est trop faible:$this->definition_ecran");
                }
                if (strlen($this->definition_ecran) > 6) {
                    array_push($errors, "La valeur de la définition de l'écran est trop grande:$this->definition_ecran");
                }
                if ($this->batterie < 1500) {
                    array_push($errors, "La valeur de la batterie est trop faible:$this->batterie");
                }
                if ($this->batterie > 18000) {
                    array_push($errors, "La valeur de la batterie est trop grande:$this->batterie");
                }
                if (!empty($this->nb_capteur))
                {
                    if (strlen($this->nb_capteur) < 1) {
                        array_push($errors, "La valeur du nombre de capteur est trop faible:$this->nb_capteur");
                    }
                }
                if (strlen($this->nb_capteur) > 15) {
                    array_push($errors, "La valeur du nombre de capteur est trop grande:$this->nb_capteur");
                }
                if (!empty($this->taile_gravure))
                {
                    if (strlen($this->taile_gravure) < 1) {
                        array_push($errors, "La valeur de la taille de la gravure est trop faible:$this->taile_gravure");
                    }
                }
                if (strlen($this->taile_gravure) > 15) {
                    array_push($errors, "La valeur de la taille de la gravure est trop élevé:$this->taile_gravure");
                }
                if (strlen($this->nom) < 3) {
                    array_push($errors, "La nom est trop petit:$this->nom");
                }
                if (strlen($this->nom) > 40) {
                    array_push($errors, "La nom est trop grand:$this->nom");
                }
                if (strlen($this->marque) < 3) {
                    array_push($errors, "La nom de la marque est trop :$this->marque");
                }
                if (strlen($this->marque) > 40) {
                    array_push($errors, "La nom de la marque est trop grand:$this->marque");
                }
                if ($this->prix < 25) {
                    array_push($errors, "La prix est trop petit:$this->prix");
                }
                if ($this->prix > 3500) {
                    array_push($errors, "La prix est trop grand:$this->prix");
                }
                if (strlen($this->number) < 1) {
                    array_push($errors, "Vous devez avoir au moins 1 produit en stock!:$this->number");
                }
                if (strlen($this->number) > 40000) {
                    array_push($errors, "Vous ne pouvez pas avoir plus de quarante-mille produit en stock!:$this->number");
                }
                 if (!empty($this->resolution_ecran))
                {
                    if ($this->resolution_ecran < 6) {
                        array_push($errors, "La résolution de l'écran est trop faible:$this->resolution_ecran");
                 }
                }
                if ($this->resolution_ecran > 90000) {
                    array_push($errors, "La raisonlution de l'écran est trop haute:$this->resolution_ecran");
                }

            }else{
                array_push($errors, "Vous n'êtes pas vendeur");
            }

            if (count($errors) < 1) {
                /*                    $this->marque = strtoupper($this->marque);*/
                ajouter($this->imgname,$this->imgsize,$this->imgtype,$this->imgtmp,$this->resum,$this->description
                    ,$this->systeme,$this->interface_utilisateur,$this->ratio,$this->luminosite,
                    $this->puce_graphique, $this->ram,$this->memoire_flash,$this->dast,$this->dastr,$this->dasm,$this->double_sim,$this->taille
                    ,$this->type_ecran,$this->definition_ecran,$this->batterie,$this->nb_capteur,$this->taile_gravure,$this->nom,
                    $this->marque,$this->number,$this->prix,$this->iduser,$this->resolution_ecran);

                header('Location: accueil');
            }else {
                return $errors;
            }
        }
    }



    //Template
    $template = 'ajout';
    //Layout (contient header , footer)
    include('view/layout.php');
}