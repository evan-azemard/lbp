<!--Accueil-->
<?php
if (isset($_POST['ppan'])) {
    $user = new C_accueil();
    $errors = $user->accueil($_POST['idppa'], $_POST['prix']);
} else {
    $errors = array();
}

if (!empty($_POST['Envoyer'])) {
    $user = new C_accueil();
    $errors = $user->contact_accueil($_POST['email'], $_POST['id'],$_POST['mp']);
} else {
    $errors = array();
}
$user = new C_accueil();
$user->redeletteA();

?>
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
            <?php include 'error.php'; ?>

        <article id="accueil_section3_article-form" class="invi">
            <form method="post" id="form_contacte" class="invi">
                <div id="accueil_form1" class="invi">
                    <h2 class="invi">Contact</h2>
                </div>
                <div id="accueil_form2" class="invi">
                    <input id="email"aria-label="email" name="email" type="email" minlength="5" maxlength="25" class="invi jsemail" placeholder="Email">
                </div>
                <div id="accueil_form3" class="invi">
                    <input aria-label="id" type="number" name="id" placeholder="Id produit*"  maxlength="50000" class="invi jsid" id="number2">
                </div>
                <div id="accueil_form4" class="invi">
                    <label for="textare" class="invi">Message</label>
                    <div id="contient_textarea" class="invi">
                        <textarea id="textare" name="mp" class="invi jsmessage" minlength="10" maxlength="500" placeholder="Message"></textarea>
                    </div>
                </div>
                <div id="accueil_form5" class="invi">
                    <input type="submit"  name="Envoyer" value="Envoyer" class="button jsaccueil">
                </div>
                <div id="accueil_form6" class="invi">
                    <p class="invi">*Champs non obligatoire</p>
                </div>
            </form>
        </article>
    </section>
</main>