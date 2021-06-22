<?php
if (!empty($_SESSION['id'])){
    header("Location: accueil");
}
?>
<!--Page Register-->
<?php
if (isset($_POST["submit"])) {
    $user = new Utilisateurs();
    $errors = $user->Register($_POST['pseudo'], $_POST['tel'], $_POST['password'], $_POST['email'], $_POST['r_password'], $_POST['age'], $_POST['prenom'], $_POST['nom'], $_POST['choix'], $_POST['adresse']);
} else {
    $errors = array();
}

?>

<div class="bg__inscription">
    <main id="register_main">
        <section id="register_section1">
            <article id="register_titre">
                <h1>Politique d'inscription<br> de Smart Your Future</h1>
            </article>
            <article id="register_text1">
                <p><span id="register_g1">"</span>Pour le contenu protégé par les droits de propriété intellectuelle, comme les photos ou vidéos
                    (contenu de propriété intellectuelle), vous nous donnez spécifiquement la permission suivante (…)<br><br>
                    vous nous accordez une licence non-exclusive, transférable, sous-licenciable, sans redevance et
                    mondiale pour l’utilisation des contenus de propriété intellectuelle que vous </p>

                <p>
                    publiez sur Smart Your Future ou en relation avec Smart Your Future (licence de propriété intellectuelle).<br><br>
                    Cette licence de propriété intellectuelle se termine lorsque vous supprimez vos contenus de propriété intellectuelle ou votre
                    compte, sauf si votre contenu a été partagé avec d’autres personnes qui ne l’ont pas supprimé.<span id="register_g2">"</span></p>
            </article>
        </section>
        <?php include 'error.php'; ?>
        <section id="register_section2">
            <form method="post" id="register_form">
                <article id="register_form_article1">
                    <h2>Inscription</h2>
                </article>
                <article id="register_form_article2">
                    <div class="register_form_contient">
                        <div class="register_labput">
                            <label class="register_invi" for="pseudo">Pseudo</label>
                            <input  placeholder="Pseudo" <?php if (!empty($_POST['pseudo'])){ ?>style="color: red"
                                    value="<?php echo Htmlspecialchars($_POST['pseudo']) ?>"
                                <?php ;}?> type="text" name="pseudo" minlength="4" maxlength="12" id="pseudo" required>
                        </div>
                        <div class="register_labput">
                            <label class="register_invi" for="téléphone">Téléphone</label>
                            <div id="telregister">
                                <p class="register_invi">+33</p>
                            </div>
                            <input  placeholder="Téléphone : +33" type="number" <?php if (!empty($_POST['tel'])){ ?>style="color: red"  value="<?php echo Htmlspecialchars($_POST['tel']) ?>"<?php ;}?> name="tel" maxlength="9" minlength="9" id="téléphone" required>
                        </div>
                    </div>
                    <div class="register_form_contient">
                        <div class="register_labput">
                            <label  class="register_invi" for="password">Mot de passe </label>
                            <input  placeholder="Password" type="password" name="password" minlength="12" maxlength="40" id="password" required>
                        </div>
                        <div class="register_labput">
                            <label class="register_invi" for="email">Email</label>
                            <input placeholder="Email" type="email" <?php if (!empty($_POST['email'])){ ?>style="color: red"  value="<?php echo Htmlspecialchars($_POST['email']) ?>"<?php ;}?> name="email" minlength="9" maxlength="35" id="email" required>
                        </div>
                    </div>
                    <div class="register_form_contient">
                        <div class="register_labput">
                            <label class="register_invi" for="confirme_password">Confirmer le mot de passe</label>
                            <input placeholder="Confirmer password" type="password" name="r_password" minlength="12" maxlength="40" id="confirme_password" required>
                        </div>
                        <div class="register_labput">
                            <label class="register_invi" for="age">Âge</label>
                            <input  placeholder="Age" type="number" name="age" <?php if (!empty($_POST['age'])){ ?>style="color: red"  value="<?php echo Htmlspecialchars($_POST['age']) ?>"<?php ;}?>  minlength="13" maxlength="115" id="age" required>
                        </div>
                    </div>
                    <div class="register_form_contient">
                        <div class="register_labput">
                            <label  class="register_invi" for="prenom">Prénom</label>
                            <input placeholder="Prénom" type="text" name="prenom" <?php if (!empty($_POST['prenom'])){ ?>style="color: red"  value="<?php echo Htmlspecialchars($_POST['prenom']) ?>"<?php ;}?> maxlength="12" min="3" id="prenom" required>
                        </div>
                        <div class="register_labput">
                            <label class="register_invi" for="adresse">Adresse complète</label>
                            <input placeholder="Adresse" type="text" minlength="20" maxlength="80"  <?php if (!empty($_POST['adresse'])){ ?>style="color: red"  value="<?php echo Htmlspecialchars($_POST['adresse']) ?>"<?php ;}?> name="adresse" id="adresse" required>
                        </div>
                    </div>
                    <div class="register_form_contient">
                        <div class="register_labput">
                            <label class="register_invi" for="nom">Nom</label>
                            <input  placeholder="Nom" type="text" name="nom"  <?php if (!empty($_POST['nom'])){ ?>style="color: red"  value="<?php echo Htmlspecialchars($_POST['nom']) ?>"<?php ;}?> maxlength="15" min="3" id="nom" required>
                        </div>
                        <div class="register_labput5">
                            <p id="labelcompte" class="register_invi">Type de compte</p>
                            <label for="choix1">Vendeur</label>
                            <input type="radio" required value="2" name="choix" id="choix1">
                            <label for="choix2">Utilisateur</label>
                            <input type="radio" required value="1" name="choix" id="choix2">
                        </div>
                </article>
                <article id="register_form_article3">
                    <input type="submit" class="button" value="Valider les choix" name="submit">
                </article>
            </form>
        </section>
    </main>
</div>