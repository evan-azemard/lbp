<?php
require('model/voir.php');

function voir(){

    class C_voir
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

         public  function logoA(){
            $rec = cherche_logo_voir($_SESSION['id']);
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

        public function repondre($id)
        {

            $this->setId($id);

            //recup les information de message pour le vendeur connecté
            $sels = selcont($this->id);
            foreach ($sels as  $sel){

                $selusers = seluser($sel['id_user']);


                /*Selectione les infos des produit*/
                $relproduit = selproduit($sel['id_produit']);

                foreach ($relproduit as $relproduits)
                {


                    if (isset($_POST['submit'])){

                        if (!empty($_POST['message']))
                        {

                            $message = 'Message de la part du vendeur  Smart Your Future
                          Votre message : ' . $selusers['resum'] . '
                          
                          Reponse : ' . $_POST['reponse']. '';

                            /*La fonction ne peut pas marcher en local*/
                            $retour = mail($selusers['email'],'Réponsse Vendeur SYF', $message);
                            if($retour) {
                                ?><script> alert("Votre message a bien été envoyé.") </script>
                                <?php

                                supp_voir_mp($_POST['id_voir']);
                            }
                        }
                    }

                    if (isset($_POST['supprimer'])){
                        supp_voir_mp($_POST['id_voir']);
                        ?><meta http-equiv="refresh" content="0"><?php
                    }
                    ?>

                    <div class="admin_div">
                        <div class="admin_cont1">
                            <div class="admin_cont1_text">
                                <div class="admin_label">
                                    <p>Nom : <span class="admin_gray"><?= $selusers['nom'] ?></span> </p>
                                </div>
                                <div class="admin_label">
                                    <p>Prénom : <span class="admin_gray"><?= $selusers['prenom'] ?></span></p>
                                </div>
                                <div class="admin_label">
                                    <p>Id produit : <span class="admin_gray">  <?= $relproduits['id_produit'] ?></span> </p>
                                </div>
                                <div class="admin_label">
                                    <p>Nom du produit : <span class="admin_gray"><?= $relproduits['nom_model'] ?></span> </p>
                                </div>
                            </div>
                            <div class="admin_cont1_textarea">
                                <div class="admin_cont_texta">
                                    <p style="display: flex">
                                        <?= $sel['message'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="traimoyen_admin"></div>
                        <div class="admin_cont2">
                            <form class="admin_form" method="post">
                                <input type="text" value="<?= $sel['id']?>"style="display:none;" name="id_voir" >
                                <textarea aria-label="textarea" name="reponse" class="admin_textarea" placeholder="Méssage de réponse[...]"></textarea>
                                <div class="admin_button">
                                    <input type="submit" class="button" name="submit" value="Envoyer">
                                    <input type="submit" class="button" name="supprimer" value="Supprimer">
                                    <!--                    <input type="submit" class="button" name="signaler" value="Signaler">
                                    -->                </div>
                            </form>
                        </div>
                    </div>

                    <?php
                }
            }
        }
    }


    //Template
    $template = 'voir';
    //Layout (contient header , footer)
    include('view/layout.php');
}