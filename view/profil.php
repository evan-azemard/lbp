<?php
if (empty($_SESSION['id'])) {
    header("Location: accueil");
}
?>
<!--Page profil-->
<?php

if (isset($_POST["submit"])) {
    $user = new C_profil();
    $errors = $user->Update(
        !empty($_POST['pseudo']) ? $_POST['pseudo'] : $_SESSION['pseudo'],
        !empty($_POST['tel']) ? $_POST['tel'] : $_SESSION['tel'],
        $_POST['password'],
        !empty($_POST['email']) ? $_POST['email'] : $_SESSION['email'],
        $_POST['r_password'],
        !empty($_POST['age']) ? $_POST['age'] : $_SESSION['age'],
        !empty($_POST['prenom']) ? $_POST['prenom'] : $_SESSION['prenom'],
        !empty($_POST['nom']) ? $_POST['nom'] : $_SESSION['nom'],
        !empty($_POST['adresse']) ? $_POST['adresse'] : $_SESSION['adresse']
    );
} else {
    $errors = array();
}

?>
<main id="profil_main">
    <?php include 'error.php'; ?>
    <section id="section_profil">
        <form method="POST" id="profil_form">
            <article id="register_form_article1">
                <h2>Profil de <?php echo  $_SESSION["pseudo"]; ?></h2>
            </article>
            <article id="register_form_article2">
                <div class="register_form_contient">
                    <div class="register_labput">
                        <label for="pseudo"> Pseudo</label>
                        <input type="text" minlength="4" placeholder="<?= $_SESSION['pseudo'] ?>" name="pseudo" maxlength="12" id="pseudo">
                    </div>
                    <div class="register_labput">
                        <label for="téléphone">Téléphone</label>
                        <div id="telregister">
                            <p>+33</p>
                        </div>
                        <input type="number" name="tel" placeholder="<?= $_SESSION['tel'] ?>" maxlength="9" minlength="9" id="téléphone">
                    </div>
                </div>
                <div class="register_form_contient">
                    <div class="register_labput">
                        <label for="password">Mot de passe</label>
                        <input type="password" placeholder="password" name="password" minlength="12" maxlength="40" id="password">
                    </div>
                    <div class="register_labput">
                        <label for="email">Email</label>
                        <input type="email" minlength="9" placeholder="<?= $_SESSION['email'] ?>" name="email" maxlength="35" id="email">
                    </div>
                </div>
                <div class="register_form_contient">
                    <div class="register_labput">
                        <label for="confirme_password">Confirmation du mot de passe</label>
                        <input type="password" placeholder="confirmer password" name="r_password" minlength="12" maxlength="40" id="confirme_password">
                    </div>
                    <div class="register_labput">
                        <label for="age">Âge</label>
                        <input type="number" name="age" placeholder="<?= $_SESSION['age'] ?>" minlength="13" maxlength="115" id="age">
                    </div>
                </div>
                <div class="register_form_contient">
                    <div class="register_labput">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" placeholder="<?= $_SESSION['prenom'] ?>" maxlength="12" min="3" id="prenom">
                    </div>
                    <div class="register_labput register_labput_login">
                        <label for="adresse">Nouvelle adresse complète</label>
                        <input type="text" name="adresse" placeholder="<?= $_SESSION['adresse'] ?>" minlength="20" maxlength="80" id="adresse">
                    </div>
                </div>
                <div class="register_form_contient">
                    <div class="register_labput">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" placeholder="<?= $_SESSION['nom'] ?>" maxlength="15" min="3" id="nom">
                    </div>
                </div>
            </article>
            <article id="register_form_article3_button" style="display: flex; flex-direction: column; align-content: center">
                <div class="button_profil_text">
                    <input type="submit" class="button marg" value="Valider les choix" name="submit">
                </div>
                <div class="button_profil_text">
                    <p>Modifier uniquement les champs que vous avez besoin. Cette action est iréverssible ! </p>
                </div>
            </article>
        </form>
    </section>
</main>