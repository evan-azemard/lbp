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

        public function affiche_panier($id)
        {




            $this->setId($id);

            if (isset($_POST['Supprimer']))
            {
                d_panier($_POST['idproduit'], $this->id);

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
                                    <?= $key['resum'] ?>
                                </div>
                                <div class="card_panier_text_div2">
                                    <div class="panier_commende">
                                        <h2><?= $key['nom_model'] ?></h2>
                                    </div>
                                    <div class="panier_commende2">
                                        <div><?= $key['prix_article'] ?> €</div>
                                        <div class="code"><?= $key['code'] ?></div>
                                    </div>
                                    <div class="panier_commende">
                                        <form name="panierform1" method="post">
                                            <input type="hidden" name="idproduit" value="<?= $key['id_produit'] ?>">
                                            <input type="submit" name="Supprimer" value="Supprimer" class="button_panier">
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
                    <p><?php if (!empty($prix['prix_total'])){echo $prix['prix_total']."€";}else{echo '0 €';}?></p>
                </div>
                <form name="panier_valider" method="post" >
                    <input type="submit" name="acheter" value="Passer au paiment" class="button_panier">
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