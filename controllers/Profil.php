<?php
/*Rgister*/


require ('model/profil.php');
$errors = array();

function profil()
{
    class C_profil
    {
        private $pseudo;
        private $tel;
        private $password;
        private $email;
        private $r_password;
        private $age;
        private $prenom;
        private $nom;
        private $adresse;


        public function getPseudo()
        {
            return $this->pseudo;
        }

        public function setPseudo($pseudo)
        {
            $this->pseudo = $pseudo;
        }

        public function getTel()
        {
            return $this->tel;
        }

        public function setTel($tel)
        {
            $this->tel = $tel;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getR_password()
        {
            return $this->r_password;
        }

        public function setR_password($r_password)
        {
            $this->r_password = $r_password;
        }

        public function getAge()
        {
            return $this->age;
        }

        public function setAge($age)
        {
            $this->age = $age;
        }

        public function getPrenom()
        {
            return $this->prenom;
        }

        public function setPrenom($prenom)
        {
            $this->prenom = $prenom;
        }

        public function getNom()
        {
            return $this->nom;
        }

        public function setNom($nom)
        {
            $this->nom = $nom;
        }


        public function getAdresse()
        {
            return $this->adresse;
        }

        public function setAdresse($adresse)
        {
            $this->adresse = $adresse;
        }

        public function Update($pseudo, $tel, $password, $email, $r_password, $age, $prenom, $nom, $adresse)
        {
            $this->setPseudo($pseudo);
            $this->setTel($tel);
            $this->setPassword($password);
            $this->setEmail($email);
            $this->setR_password($r_password);
            $this->setAge($age);
            $this->setPrenom($prenom);
            $this->setNom($nom);
            $this->setAdresse($adresse);
            $errors = array();

            $hpass = password_hash($this->password, PASSWORD_DEFAULT);
            if ($this->pseudo || $this->tel || $this->password || $this->email || $this->r_password || $this->age || $this->prenom || $this->nom || $this->adresse) {

                if (strlen($this->pseudo) > 12) {
                    array_push($errors, "Le pseudo est trop long");
                }
                if (strlen($this->pseudo) < 4) {
                    array_push($errors, "Le pseudo est trop court");
                }
                if (strlen($this->nom) > 15) {
                    array_push($errors, "Le nom est trop long");
                }
                if (strlen($this->nom) < 3) {
                    array_push($errors, "Le nom est trop court");
                }
                if (strlen($this->prenom) > 12) {
                    array_push($errors, "Le prénom est trop long");
                }
                if (strlen($this->prenom) < 3) {
                    array_push($errors, "Le prénom est trop court");
                }
                if (!empty($this->password) && empty($this->r_password)) {
                    array_push($errors, "Veuillez confirmer le password !");
                }
                if (!empty($this->password) && !empty($this->r_password))
                {
                    if ($this->password !== $this->r_password) {
                        array_push($errors, "Le mot de passe répété n'est pas le même");
                    }
                }
                if ($this->pseudo === $this->password) {
                    array_push($errors, "Le pseudo et le mot de passe ne doivent pas être identique");
                }
                $password_required = preg_match('%^(?=[^A-Z]*+.)(?=[^a-z]*+.)(?=[^0-9]*+.)(?=[^\W]*+.)%', $this->password);
                if (!$password_required) {
                    array_push($errors, 'Il faut au moins: 1 caractère spéciale, majuscule, minuscule,  nombre. ');
                }
                $mail = (filter_var($this->email, FILTER_VALIDATE_EMAIL));
                if (!$mail) {
                    array_push($errors, 'Rentrer une adresse email valide ');
                }
                if ($this->age < 18) {
                    array_push($errors, "Il faut avoir 18 ans !");
                }
                if ($_SESSION["rank"] = 1 && $_SESSION["rank"] != 2)
                {
                    $sel = select();

                    foreach ($sel as $row) {
                        if (isset($row))
                        {

                            if ($row["pseudo"] == $this->pseudo) {
                                array_push($errors, "Le pseudo est déja utilisé");
                            }
                            if ($row["tel"] == $this->tel) {
                                array_push($errors, "Ce numéro est déjà utilisé");
                            }
                            if ($row["email"] == $this->email) {
                                array_push($errors, "Cette email est déja utilisé");
                            }
                            if ($row["prenom"] == $this->prenom && $row['nom'] == $this->nom) {
                                array_push($errors, "Un utilisateur porte déjà ce nom et prénom");
                            }
                        }
                    }
                }

                if ($_SESSION["rank"] = 2 && $_SESSION["rank"] != 1)
                {
                    $selle = select2();

                    foreach ($selle as $rows) {
                        if (isset($rows))
                        {
                            if ($rows["pseudo"] == $this->pseudo) {
                                array_push($errors, "Le pseudo est déja utilisé");
                            }
                            if ($rows["tel"] == $this->tel) {
                                array_push($errors, "Ce numéro est déjà utilisé");
                            }
                            if ($rows["email"] == $this->email) {
                                array_push($errors, "Cette email est déja utilisé");
                            }
                            if ($rows["prenom"] == $this->prenom && $rows['nom'] == $this->nom) {
                                array_push($errors, "Un utilisateur porte déjà ce nom et prénom");
                            }
                        }
                    }
                }
            }


            if (count($errors) < 1) {
                if (!empty($this->password)){
                    if ($_SESSION["rank"] = 1 && $_SESSION["rank"] != 2) {
                        UpdateA($this->pseudo, $hpass, $this->tel, $this->email, $this->age, $this->prenom, $this->nom, $this->adresse);
                        /*2 = sellers*/
                    } else if ($_SESSION["rank"] = 2 && $_SESSION["rank"] != 1) {
                        UpdateB($this->pseudo, $hpass, $this->tel, $this->email, $this->age, $this->prenom, $this->nom, $this->adresse);
                    }
                }
                if (empty($this->password)){
                    if ($_SESSION["rank"] = 1 && $_SESSION["rank"] != 2 && $this->password = "vide") {
                        UpdateAA($this->pseudo, $this->tel, $this->email, $this->age, $this->prenom, $this->nom, $this->adresse);
                        /*2 = sellers*/
                    } else if ($_SESSION["rank"] = 2 && $_SESSION["rank"] != 1  && $this->password = "vide") {
                        UpdateBB($this->pseudo, $this->tel, $this->email, $this->age, $this->prenom, $this->nom, $this->adresse);
                    }
                }
                session_unset();
                header("Location: login");
            } else {
                return $errors;
            }
        }
    }

    //Template
    $template = 'profil';
    //Layout (contient header , footer)
    include('view/layout.php');

}