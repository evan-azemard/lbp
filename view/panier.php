<?php
if (empty($_SESSION['id'])) {
    header("Location: accueil");
}
$user = new C_affiche();
$user->logoA();
?>

<main id="panier_main">
    <section id="panier_section">
        <article id="panier_h1">
            <h1>Votre panier</h1>
        </article>
        <?php $key = $user->affiche_panier($_SESSION['id']); ?>
    </section>
</main>
<script type="text/javascript" src="controllers/panier.js"></script>
