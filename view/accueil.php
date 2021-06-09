<!--Accueil-->
<main id="accueil_main">
    <!--Affiche de promotion-->
    <section id="accueil_section1">
        <article id="accueil_section1_article1">
            <h2>Promotion de printemps
                65% ! avec le code <span class="nompromo">“Printemps”</span></h2>
        </article>
        <article id="accueil_section1_article2">
            <h2 class="promo">"Printemps"</h2>
        </article>
    </section>

    <h2>Derniers produits ajoutés</h2>


 <?= recent(); ?>

    <div class="traimoyen"></div>

    <section id="accueil_section3">
        <article id="accueil_section3_article-form">
            <form method="post" id="form_contacte">
                <div id="accueil_form1">
                    <h2>Contact</h2>
                </div>
                <div id="accueil_form2">
                    <label for="email">Email</label>
                    <input id="email" type="email">
                </div>
                <div id="accueil_form3">
                    <label for="number2">Id du produit*</label>
                    <input type="text" id="number2">
                </div>
                <div id="accueil_form4">
                    <label for="textare">Message</label>
                    <div id="contient_textarea">
                        <textarea id="textare"></textarea>
                    </div>
                </div>
                <div id="accueil_form5">
                    <input type="submit" value="Envoyer" class="button">
                </div>
                <div id="accueil_form6">
                    <p>*Champs non obligatoire</p>
                </div>
            </form>
        </article>
    </section>
</main>
<!--la v50-->