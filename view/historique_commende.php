<?php
if (empty($_SESSION['id'])) {
    header("Location: accueil");
}

$user = new C_historique_commende();
$recup = $user->historiquecommende_f();
$user->logoA();

?>
<main id="historique_commende">
    <section id="commende_section">
        <article id="panier_h1">
            <h1>Votre historique de commende</h1>
        </article>
        <?php
        foreach ($recup as $affiche){
            ?>

                   <article class="panier_card">
            <div class="card_panier_img">
                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($affiche['bin_img']) . '"  alt="mon image" title="image"/>'; ?>
            </div>
            <div class="card_panier_text">
                <div class="card_panier_text_div1">
                    <p>
                        <?= Htmlspecialchars($affiche['resum_article']) ?>
                    </p>
                </div>
                <div class="card_panier_text_div2">
                    <div class="panier_commende">
                        <h2><?= Htmlspecialchars($affiche['nom_article']) ?></h2>
                    </div>
                    <div class="panier_commende2">
                        <div><?= Htmlspecialchars($affiche['prix_article']) ?></div>
                        <div>
                            <p>#<?= Htmlspecialchars($affiche['id_produit']) ?></p>
                        </div>
                    </div>
                    <div class="panier_commende">
                    </div>
                </div>
            </div>
        </article>
        <div class="traimoyenpanier"></div>



            <?php
        }
        ?>

</main>