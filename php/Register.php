<?php
/*Rgister*/

require('../model/register.php');

    class Utilisateurs
    {
        private $pseudo;
        private $tel;
        private $password;
        private $email;
        private $r_password;
        private $age;
        private $prenom;
        private $nom;
        private $choix;
        private $adresse;

        public function setPseudo($pseudo)
        {
            $this->pseudo = $pseudo;
        }
        public function setTel($tel)
        {
            $this->tel = $tel;
        }
        public function setPassword($password)
        {
            $this->password = $password;
        }
        public function setEmail($email)
        {
            $this->email = $email;
        }
        public function setR_password($r_password)
        {
            $this->r_password = $r_password;
        }
        public function setAge($age)
        {
            $this->age = $age;
        }
        public function setPrenom($prenom)
        {
            $this->prenom = $prenom;
        }
        public function setNom($nom)
        {
            $this->nom = $nom;
        }
        public function setChoix($choix)
        {
            $this->choix = $choix;
        }
        public function setAdresse($adresse)
        {
            $this->adresse = $adresse;
        }

        public function Register($pseudo, $tel, $password, $email, $r_password, $age, $prenom, $nom, $choix, $adresse)
        {
            $this->setPseudo($pseudo);
            $this->setTel($tel);
            $this->setPassword($password);
            $this->setEmail($email);
            $this->setR_password($r_password);
            $this->setAge($age);
            $this->setPrenom($prenom);
            $this->setNom($nom);
            $this->setChoix($choix);
            $this->setAdresse($adresse);
            $errors = array();


            if ($this->pseudo && $this->tel && $this->password && $this->email && $this->r_password && $this->age && $this->prenom && $this->prenom && $this->nom && $this->choix) {

                $hpass = password_hash($this->password, PASSWORD_DEFAULT);

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
                    array_push($errors, "Le pr??nom est trop long");
                }
                if (strlen($this->prenom) < 3) {
                    array_push($errors, "Le pr??nom est trop court");
                }
                if ($this->password !== $this->r_password) {
                    array_push($errors, "Le mot de passe r??p??t?? n'est pas le m??me");
                }
                if ($this->password  < 8) {
                    array_push($errors, "Le mot de passe est trop court");
                }
                $password_required = preg_match('%^(?=[^A-Z]*+.)(?=[^a-z]*+.)(?=[^0-9]*+.)(?=[^\W]*+.)%', $this->password);
                if (!$password_required) {
                    array_push($errors, 'Il faut au moins: 1 caract??re sp??cial, majuscule, minuscule,  nombre. ');
                }
                if ($this->pseudo == $this->password) {
                    array_push($errors, "Le pseudo et le mot de passe ne doivent pas ??tre identique");
                }
                $mail = (filter_var($this->email, FILTER_VALIDATE_EMAIL));
                if (!$mail) {
                    array_push($errors, 'Rentrer une adresse email valide ');
                }
                if ($this->age < 18) {
                    array_push($errors, "Il faut avoir 18 ans !");
                }
                if ($this->choix = 1 && $this->choix != 2) {
                    $sel = selectusers();

                    foreach ($sel as $row) {
                        if (isset($row)) {
                            if ($row["pseudo"] == $this->pseudo) {
                                array_push($errors, "Le pseudo est d??ja utilis??");
                            }
                            if ($row["tel"] == $this->tel) {
                                array_push($errors, "Ce num??ro est d??j?? utilis??");
                            }
                            if ($row["email"] == $this->email) {
                                array_push($errors, "Cette email est d??ja utilis??");
                            }
                            if ($row["prenom"] == $this->prenom && $row['nom'] == $this->nom) {
                                array_push($errors, "Un utilisateur porte d??j?? ce nom et pr??nom");
                            }
                        }
                    }
                }

                if ($this->choix = 2 && $this->choix != 1) {
                    $selle = selectsellers();

                    foreach ($selle as $rows) {
                        if (isset($rows)) {
                            if ($rows["pseudo"] == $this->pseudo) {
                                array_push($errors, "Le pseudo est d??ja utilis??");
                            }
                            if ($rows["tel"] == $this->tel) {
                                array_push($errors, "Ce num??ro est d??j?? utilis??");
                            }
                            if ($rows["email"] == $this->email) {
                                array_push($errors, "Cette email est d??ja utilis??");
                            }
                            if ($rows["prenom"] == $this->prenom && $rows['nom'] == $this->nom) {
                                array_push($errors, "Un utilisateur porte d??j?? ce nom et pr??nom");
                            }
                        }
                    }
                }
            } else {
                array_push($errors, "Veuillez remplire tout les champs !");
            }
            if (count($errors) < 1) {
                if ($this->choix = 1 && $this->choix != 2) {
                    RegisterA($this->pseudo, $hpass, $this->tel, $this->email, $this->age, $this->prenom, $this->nom, $this->adresse);
                    /*2 = sellers*/
                } else if ($this->choix = 2 && $this->choix != 1) {
                    RegisterB($this->pseudo, $hpass, $this->tel, $this->email, $this->age, $this->prenom, $this->nom, $this->adresse);
                }
                ?> <script>window.location.replace("login.php");</script><?php
            } else {
                return $errors;
            }
        }
    }

