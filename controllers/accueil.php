<?php
require('model/accueil.php');

//Plus tard pour afficher les produit phare sur l'accueil
function accueil()
{



    class C_accueil
    {

        private $id;
        private $prix;
        private $mp;
        private $email;
        private $iden;

        public function getIden()
        {
            return $this->iden;
        }

        public function getEmail()
        {
            return $this->email;
        }
        public function getMp()
        {
            return $this->mp;
        }
        public function getId()
        {
            return $this->id;
        }
        public function getPrix()
        {
            return $this->prix;
        }

        public function setIden($iden)
        {
            $this->iden = $iden;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function setMp($mp)
        {
            $this->mp = $mp;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setPrix($prix)
        {
            $this->prix = $prix;
        }


        public function  redeletteA(){
            $rec = recup_id_commendeA();

            foreach ($rec as $rere){
                deletteA((int)$rere['id_produit']);
            }

        }
        public  function logoA()
        {
            if (isset($_SESSION['id'])){
                       $rec = cherche_logo_A($_SESSION['id']);
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

        }
        public  function contact_accueil($email,$iden,$mp){
            $this->setEmail($email);
            $this->setIden($iden);
            $this->setMp($mp);
            $errors = array();


            if ($this->email AND $this->mp) {

                if (strlen($this->email) < 5) {
                    array_push($errors, "L'adresse email est trop courte : $this->email");
                }
                if (strlen($this->email) > 25) {
                    array_push($errors, "L'adresse email est trop longue : $this->email");
                }
                if (strlen($this->mp) < 5) {
                    array_push($errors, "Le méssage est trop court: $this->mp");
                }
                if (strlen($this->mp) > 500) {
                    array_push($errors, "Le méssage est trop long : $this->mp");
                }
                if (strlen($this->iden) > 5) {
                    array_push($errors, "L'id est trop long : $this->iden");
                }

            }else{
                array_push($errors, "Veuillez rensseigner au minimum une adresse email et un méssage !");
            }
            if (count($errors) < 1) {
                #fuction id sinon sans
                if (isset($this->iden)&& isset($this->email)&&isset($this->mp)){
                    savid($this->iden,$this->email,$this->mp);
                }elseif (isset($this->email)&&isset($this->mp)&&empty($this->iden)){
                    sav($this->email,$this->mp);
                }
            } else {
                return $errors;
            }
        }



        public function accueil($id, $prix)
        {
            $this->setId($id);
            $this->setPrix($prix);
            $errors = array();



            if (count($errors) < 1) {

                $prixf = (int)$prix;
                $id_user = (int)$_SESSION['id'];
                $id_article = (int)$this->id;

                ajout_panierA($id_user, $id_article, $prixf);

                unset($prixf);

                ?><meta http-equiv="refresh" content="0"><?php

                unset($prixf);

                ?><meta http-equiv="refresh" content="0"><?php
            }
        }
    }




    function recent() {

        $articles = article_accueil();

        ?>
        <div class="growflex">
            <section id="accueil_section2">
                <?php
                foreach ($articles as $article)
                {
                    ?>
                    <article class="body_cards produitcard">
                        <div class="cards_img">
                            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($article['bin_img']) . '"  alt="mon image" title="image"/>'; ?>

                        </div>
                        <div class="cards_des">
                            <h3>
                                <?php
                                $str = strlen($article['nom_model']);
                                if (strlen($str > 12)) {
                                    $tt = substr($article['nom_model'], 0, 12) . '...';
                                    echo  $tt;
                                } else {
                                    echo $article['nom_model'];
                                } ?>
                            </h3>
                            <p> <?php

                                $t = strlen($article['resum']);

                                $tt = substr($article['resum'], 0, 120);


                                $a = substr($tt, 0, 40);
                                $b = substr($tt, 40, 40);
                                $c = substr($tt, 80, 40);
                                $d = substr($tt, 120, 40);
                                $e = substr($tt, 160, 40);


                                echo $a . "<br/>" . $b . "<br/>" . $c . "<br/>" . $d . "<br/>" . $e . "<br/>";

                                ?></p>
                        </div>
                        <div class="cards_logo">
                            <form method="post" style="display: flex" class="form_cards_logo">
                                <input style="cursor: pointer" type="submit" name="ppan" value="Ajouter">
                                <input type="text" aria-label="pasID" name="idppa" value="<?= $article['id_produit'] ?>" style="display: none">
                                <input type="text" aria-label="pasprix" id="prix" name="prix" value="<?= $article['prix_article'] ?>" style="display: none">
                            </form>

                            <p><?= $article['prix_article']?> €</p>
                            <p><?= $article['code']?></p>
                            <button><a href="contact?id_produit=<?= $article['id_produit']?>">Contacter</a></button>
                        </div>
                    </article>


                    <?php
                } ?>
            </section>
        </div>
        <?php
    }


    //Template
    $template = 'accueil';
    //Layout (contient header , footer)
    include('view/layout.php');
}
