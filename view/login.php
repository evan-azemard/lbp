<!--lOGIN PAGE-->
<?php
if (!empty($_SESSION['id'])){
    header("Location: accueil");
}
?>
<?php
if (isset($_POST["submit"])) {
    $user = new C_Login();
    $errors = $user->loginF($_POST['pseudo'], $_POST['password'], $_POST['email'], $_POST['choix']);
} else {
    $errors = array();
}
?>
<main id="login_main">
    <?php include 'error.php'; ?>
    <section id="section_login">
        <form method="post" id="login_form">
            <article class="login_article_button">
                <div class="login_labput_button">
                    <p id="lolo">Connexion</p>
                </div>
            </article>
            <article class="login_article">
                <div class="login_labput">
                    <label class="login_invi" for="pseudo">Pseudo</label>
                </div>
                <div class="login_labput">
                    <input placeholder="Pseudo" class="logininput" <?php if (!empty($_POST['pseudo'])){ ?>style="color: red"  value="<?php echo $_POST['pseudo'] ?>"<?php ;}?> type="text" name="pseudo" id="pseudo" required>
                </div>
            </article>
            <article class="login_article">
                <div class="login_labput">
                    <label class="login_invi" for="password">Mot de passe</label>

                </div>
                <div class="login_labput">
                    <input placeholder="Mot de passe" class="logininput" type="password"   name="password" autocomplete="on" id="password" required>

                </div>
            </article>
            <article class="login_article">
                <div class="login_labput">
                    <label class="login_invi" for="email">Email</label>

                </div>
                <div class="login_labput">
                    <input placeholder="Email" class="logininput" type="email"  <?php if (!empty($_POST['email'])){ ?>style="color: red"  value="<?php echo $_POST['email'] ?>"<?php ;}?> name="email" id="email" required>

                </div>
            </article>
            <article class="login_article">
                <div class="login_labput2">
                    <p class="lolo2 login_invi">Type de compte </p>
                </div>
                <div id="login_labput_radio">
                    <div class="radio">
                        <div class="centre_radio">
                            <label class="lolo2" for="choix1">Vendeur</label>
                        </div>
                        <div class="centre_radio2">
                            <input class="lolo3" type="radio" required value="2" name="choix" id="choix1" placeholder="">
                        </div>
                    </div>
                    <div class="radio">
                        <div class="centre_radio">
                            <label class="lolo2" for="choix2">Utilisateur</label>
                        </div>
                        <div class="centre_radio2">
                            <input class="lolo3" type="radio" required value="1" name="choix" id="choix2">
                        </div>
                    </div>
                </div>
            </article>
            <article class="login_article_button">
                <div class="login_labput_button">
                    <input type="submit" class="button" value="Valider les choix" name="submit">
                </div>
            </article>
        </form>
    </section>
</main>