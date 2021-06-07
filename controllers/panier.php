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

            if (isset($_POST['Supprimer'])) {
                d_panier($_POST['idproduit'], $this->id);

                header("refresh: 1");
            }

            /*l'id du pannier de l'utilisateur*/
            $articles =  article_panier($this->id);

            /*selectionne les id produit du panier*/
            if (!empty($articles)) {
                $articles_pp = article_pp($articles['id_panier']);


                foreach ($articles_pp as $item) {
                    $select_all = select_all($item['id_produit']);

                    foreach ($select_all as $key) {
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