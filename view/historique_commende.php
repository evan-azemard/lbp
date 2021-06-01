<?php
if (empty($_SESSION['id'])){
    header("Location: accueil");
}
?>
<main id="historique_commende">
    <section id="commende_section">
        <article id="panier_h1">
            <h1>Votre historique de commende</h1>
        </article>
        <article class="panier_card">
            <div class="card_panier_img">
                <img src="img_docs/exemple.png.jpg" alt="exemple">
            </div>
            <div class="card_panier_text">
                <div class="card_panier_text_div1">
                    <p>
                    2020 qui possède un écran rotatif (de 6.8 pouces)
                    laissant apparaître un deuxième écran de 3.9 pouces.                    </p>
                </div>
                <div class="card_panier_text_div2">
                    <div class="panier_commende">
                        <h2>LG WING 5G</h2>
                    </div>
                    <div class="panier_commende2">
                        <div>750 €</div>
                        <div><p>#8</p></div>
                    </div>
                    <div class="panier_commende">
                    </div>
                </div>
            </div>
        </article>
        <div class="traimoyenpanier"></div>
</main>