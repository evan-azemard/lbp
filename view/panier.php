<?php
if (empty($_SESSION['id'])) {
    header("Location: accueil");
}
?>
<?php
$user = new C_affiche();
$errors = $user->affiche_panier($_SESSION['id']);
?>

<main id="panier_main">
    <section id="panier_section">
        <article id="panier_h1">
            <h1>Votre panier</h1>
        </article>

                <?= $key['prix_article'] ?>

        <article class="panier_card">
            <div class="card_panier_img">
                <img src="img_docs/exemple.png.jpg" alt="exemple">
            </div>
            <div class="card_panier_text">
                <div class="card_panier_text_div1">
                    <p>

                     2020 qui possède un écran rotatif (de 6.8 pouces)
                    laissant apparaître un deuxième écran de 3.9 pouces.

                    </p>
                </div>
                <div class="card_panier_text_div2">
                    <div class="panier_commende">
                        <h2>LG Wing 5g</h2>
                    </div>
                    <div class="panier_commende2">
                        <div>750€</div>
                        <form name="panierform1" method="post">
                            <input name="numberpanier" aria-label="number" placeholder="1" type="number">
                        </form>
                    </div>
                    <div class="panier_commende">
                        <form name="panierform1" method="post">
                            <input type="submit" class="button_panier">
                        </form>
                    </div>
                </div>
            </div>
        </article>
        <div class="traimoyenpanier"></div>

        <article id="commender_panier">
            <div id="totale_panier">
                <h3>Votre totale:</h3>
                <p>750€ TTC</p>
            </div>
            <form name="panier_valider" method="post" action="paiment.php">
                <input type="submit" value="Passer au paiment" class="button_panier">
            </form>
        </article>
    </section>
</main>