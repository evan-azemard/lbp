<?php
require('model/panier.php');

function panier()
{
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


         public  function logoA(){
            $rec = cherche_logo_pan($_SESSION['id']);
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

        public function affiche_panier($id)
        {

            $this->setId($id);

            if (isset($_POST['Supprimer']))
            {

                d_panier($_POST['idproduit'], $this->id);
                ?><!--<meta http-equiv="refresh" content="0">--><?php
            }

            /*l'id du pannier de l'utilisateur*/
            $articles =  article_panier($this->id);

            /*selectionne les id produit du panier*/
            if (!empty($articles))
            {
                $articles_pp = article_pp($articles['id_panier']);

                $prix = article_prix($articles['id_panier']);



                foreach ($articles_pp as $item)
                {
                    /*Selectione les informations du produit*/
                    $select_all = select_all($item['id_produit']);

                    foreach ($select_all as $key)
                    {


                        /*Trpiver l'id du vendeur*/
                        $infos  = trouveidsel($item['id_produit']);

                        foreach ($infos as $info)
                        {
                            /*Les infos du vendeur*/
                            $infosellers = infosellers($info['id_vendeur']);

                            foreach ($infosellers as $inf)
                            {
                                if (isset($_POST['acheter']))
                                {
                                    envoiepanier((int)$item['id_produit'],(int)$_SESSION['id'],(string)$key['nom_model'],(string)$key['resum'],(int)$key['prix_article'],(string)$_SESSION['nom'],(string)$inf['nom'],(int)$inf['id_user'],$articles['id_panier'],$key['nom_img'],$key['taille_img'],$key['type_img'],$key['bin_img']);

                                    ?> <script>window.location.replace("paiment");</script><?php

                                    delete_panier_article($articles['id_panier'],(int)$_SESSION['id']);

                                    $commendes = select_commende($_SESSION['id']);



                                    foreach ($commendes as  $commende)
                                    {
                                        supp_art($commende['id_produit']);
                                    }
                                }
                            }
                        }






                        ?>
                        <article class="panier_card">
                            <div class="card_panier_img">
                                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($key['bin_img']) . '"  alt="mon image" title="image"/>'; ?>
                            </div>
                            <div class="card_panier_text">
                                <div class="card_panier_text_div1">
                                    <?= Htmlspecialchars($key['resum']) ?>
                                </div>
                                <div class="card_panier_text_div2">
                                    <div class="panier_commende">
                                        <h2><?= Htmlspecialchars($key['nom_model']) ?></h2>
                                    </div>
                                    <div class="panier_commende2">
                                        <div><?= Htmlspecialchars($key['prix_article']) ?> €</div>
                                        <div class="code"><?= Htmlspecialchars($key['code']) ?></div>
                                    </div>
                                    <div class="panier_commende">
                                        <form name="panierform1" method="post" id="formpanier">
                                            <input type="hidden"  class="idproduitpanier" name="idproduit" value="<?= Htmlspecialchars($key['id_produit']) ?>">
                                            <p class="button_panier">Supprimer</p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div class="traimoyenpanier"></div>
                        <?php
                    }

                }

            } elseif (empty($articles)) {
                ?>

                <div id="panier_0">
                    <p id="produit_0">
                        Vous n'avez aucun produit dans le panier.
                    </p>
                </div>

                <?php
            }
            ?>
            <article id="commender_panier">
                <div id="totale_panier">
                    <h3>Votre totale:</h3>
                    <p><?php if (!empty($prix['prix_total'])){echo Htmlspecialchars($prix['prix_total'])."€";}else{echo '0 €';}?></p>
                </div>
                <form name="panier_valider" method="post" >
                    <input type="submit" name="acheter" value="Passer au paiment" class="button_panier2">
                </form>
            </article>
            <?php
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