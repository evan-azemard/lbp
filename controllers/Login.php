<?php
require('model/login.php');
/*Le login*/
function login()
{
    class C_Login
    {
        //ATTRIBUTES
        private $pseudo;
        private $password;
        private $email;
        private $choix;


        public function getPseudo()
        {
            return $this->pseudo;
        }

        public function setPseudo($pseudo)
        {
            $this->pseudo = $pseudo;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function getChoix()
        {
            return $this->choix;
        }

        public function setChoix($choix)
        {
            $this->choix = $choix;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function loginF($pseudo, $password, $email, $choix)
        {

            $this->setPseudo($pseudo);
            $this->setPassword($password);
            $this->setEmail($email);
            $this->setChoix($choix);
            $errors = array();

            if ($this->pseudo && $this->password && $this->choix && $this->email) {

                if ($this->choix = 1 && $this->choix != 2) {
                    $tab = F_login($this->pseudo);

                    if (isset($tab["password"]))
                    {
                        $hpass = $tab["password"];
                    }

                    if (!password_verify($this->password, $hpass)) {
                        array_push($errors, 'Mot de passe invalide par rapport à ce pseudo');
                    }
                    $mail = (filter_var($this->email, FILTER_VALIDATE_EMAIL));

                    if (!$mail) {
                        array_push($errors, 'Rentrer une adresse email valide ');
                    }
                    if ($this->email != $tab['email']) {
                        array_push($errors, 'Email invalide par rapport à ce pseudo');
                    }


                }

                if ($this->choix = 2 && $this->choix != 1) {
                    $tab = F_login2($this->pseudo);

                    if (isset($tab["password"]))
                    {
                        $hpass = $tab["password"];
                    }

                    if (!password_verify($this->password, $hpass)) {

                        array_push($errors, 'Mot de passe invalide par rapport à ce pseudo');
                    }

                    $mail = (filter_var($this->email, FILTER_VALIDATE_EMAIL));

                    if (!$mail) {
                        array_push($errors, 'Rentrer une adresse email valide ');
                    }

                    if ($this->email != $tab['email']) {
                        array_push($errors, 'Email invalide par rapport à ce pseudo');
                    }



                }


                if (count($errors) < 1) {

                    $_SESSION['password'] = "vide";
                    $_SESSION["user"] = $tab;
                    $_SESSION["id"] = $tab["id_user"];
                    $_SESSION["pseudo"] = ucfirst(strtolower($tab["pseudo"]));
                    $_SESSION["rank"] = $tab["rank"];
                    $_SESSION["tel"] = $tab["tel"];
                    $_SESSION["email"] = $tab["email"];
                    $_SESSION["age"] = $tab["age"];
                    $_SESSION["prenom"] = $tab["prenom"];
                    $_SESSION["nom"] = $tab["nom"];
                    $_SESSION["adresse"] = $tab["adresse"];

                    header('Location: accueil');
                } else {
                    return $errors;
                }
            } else {
                array_push($errors, 'Veuillez remplire tout les champs !');
            }
        }
    }


    //Template
    $template = 'login';
    //Layout (contient header , footer)
    include('view/layout.php');
}
