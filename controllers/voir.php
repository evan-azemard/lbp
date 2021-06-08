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
                       <?= $relproduits['resum'] ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="traimoyen_admin"></div>
        <div class="admin_cont2">
            <form class="admin_form">
                <textarea aria-label="textarea" class="admin_textarea" placeholder="Méssage de réponse[...]"></textarea>
                <div class="admin_button">
                    <input type="submit" class="button" name="envoyer" value="Envoyer">
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