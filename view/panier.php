<?php
if (empty($_SESSION['id']))
{
    header("Location: accueil");
}
$user = new C_affiche();
?>

<main id="panier_main">
    <section id="panier_section">
        <article id="panier_h1">
            <h1>Votre panier</h1>
        </article>

        <?php $key = $user->affiche_panier($_SESSION['id']); ?>

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