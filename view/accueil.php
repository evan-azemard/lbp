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

    <section id="accueil_section3" class="lsection">
        <article id="accueil_section3_article-form" class="larticle">
            <form class="lform" method="post">
                <div id="ldiv1">
                    <h1>Contact</h1>
                </div>
                <div id="ldiv2">
                    <input id="email" type="email" class="linput" placeholder="Email">
                    <input type="text" id="number2" class="linput" placeholder="Id du produit">
                    <textarea id="textare" class="linput2" placeholder="Message"></textarea>
                </div>
                <div id="ldiv3">
                    <input type="submit" value="Envoyer" class="lbutton">
                </div>
            </form>
        </article>
    </section>


    <section id="accueil_section3" class="invi">
        <article id="accueil_section3_article-form" class="invi">
            <form method="post" id="form_contacte" class="invi">
                <div id="accueil_form1" class="invi">
                    <h2 class="invi">Contact</h2>
                </div>
                <div id="accueil_form2" class="invi">
                    <input id="email" type="email" class="invi" placeholder="Email">
                </div>
                <div id="accueil_form3" class="invi">
                    <input type="text" placeholder="Id produit*" class="invi" id="number2">
                </div>
                <div id="accueil_form4" class="invi">
                    <label for="textare" class="invi">Message</label>
                    <div id="contient_textarea" class="invi">
                        <textarea id="textare" class="invi" placeholder="Message"></textarea>
                    </div>
                </div>
                <div id="accueil_form5" class="invi">
                    <input type="submit" onclick="invi" value="Envoyer" class="button">
                </div>
                <div id="accueil_form6" class="invi">
                    <p class="invi">*Champs non obligatoire</p>
                </div>
            </form>
        </article>
    </section>
</main>
<!--la v50-->