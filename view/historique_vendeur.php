<?php
if (empty($_SESSION['id'])){
        header("Location: accueil");
}
if ($_SESSION['rank'] == 3 ){
    header("Location: accueil");
}
if ($_SESSION['rank'] == 1 ){
    header("Location: accueil");
}
?>

<main id="historiquev_main">
    <div id="historiquev_main_info">
        <div id="historiquev_main_info_titre">
            <h1>Votre historique de vente</h1>
        </div>
        <div id="historiquev_main_info_argent">
            <span id="historiquev_color">
                <p>Votre revenu : </p>
                <p id="historiquev_argent">2250 €</p>
            </span>
        </div>
    </div>
    <section>
        <article class="card_historiquev">
            <div class="card_historiquev_img">
                <img src="img_docs/exemple.png.jpg" alt="exemple">
            </div>
            <div class="card_historiquev_text">
                <div class="card_historiquev_text_div">
                    <h2>LG WING</h2>
                </div>
                <form method="post">
                    <div class="card_historiquev_text_div1">
                        <div class="card_label_historique_vendeur">3 vendus</div>
                        <div class="card_label_historique_vendeur">39 en stock</div>
                        <div class="card_label_historique_vendeur">750 €</div>
                    </div>
                    <div class="card_historiquev_text_div2">
                        <label for="historiquev_prix" class="card_label_historique_vendeur2">Changer le prix</label>
                        <label for="historiquev_stock" class="card_label_historique_vendeur2">Changer le nombre en stock</label>
                    </div>
                    <div class="card_historiquev_text_div2">
                        <input type="number" id="historiquev_stock" placeholder="prix" class="card_label_historique_vendeur2">
                        <input type="number" id="historiquev_prix" placeholder="stock" class="card_label_historique_vendeur2">
                    </div>
                    <div class="card_historiquev_text_div">
                        <input type="submit" name="valider" class="button" value="Valider">
                        <input type="submit" name="supprimer" class="button" value="Supprimer le produit">
                    </div>
                </form>
            </div>
        </article>
        <div class="traimoyen3"></div>
    </section>
</main>