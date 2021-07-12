<?php session_start();
require_once('../library/fonctions.php');
require ('../php/Register.php');

if (!empty($_SESSION['id'])){
    header("Location: accueil.php");
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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="https://th.bing.com/th/id/R8b9399dc465e6ade5afd8001ed17a012?rik=c%2fW8QQUaPwl%2fPA&riu=http%3a%2f%2fimages.clipartpanda.com%2fphone-icon-phone-512.png&ehk=nxS%2fIZTzi%2bOuaWlzTAP5khMCqyHyy%2fG0FlBqvfFhBhI%3d&risl=&pid=ImgRaw">
    <link rel="stylesheet" type="text/css" href="../css/grand.css">
    <link rel="stylesheet" type="text/css" href="../css/moyen.css">
    <link rel="stylesheet" type="text/css" href="../css/tablette.css">
    <link rel="stylesheet" type="text/css" href="../css/phablette.css">
    <link rel="stylesheet" type="text/css" href="../css/smartphone.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Sanchez&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/560ce3d2ed.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>Smart Your Future</title>
</head>
<body>
<header>
    <div id="header_menu">
        <div class="sectiondiv">
            <div id="déroul" class="DEL" style="overflow: auto; min-height: 85%;">
                <a href="#" class="fermer" onclick="closeNav()">×</a>
                <a class="colorlien" href="accueil.php">Accueil</a>
                <?php remplaceRIEN("Inscription", "register.php"); ?>
                <?php remplaceRIEN("Connexion", "login.php"); ?>
                <?php remplaceID("Profil", "profil.php"); ?>
                <a class="colorlien" href="produit.php">Découvrer nos produits</a>
                <?php remplacev("Ajouter un article", "ajout.php"); ?>
                <?php remplacev("Historique de vente", "historique_vendeur.php"); ?>
                <?php remplacev("Messagerie", "mail.php"); ?>
                <?php remplaceID("Historique des commandes", "historique_commende.php"); ?>
                <?php remplaceID("Panier", "panier.php"); ?>
                <?php remplaceAd("Admin", "admin.php"); ?>
                <?php remplaceAdd("Gérant", "gerant.php"); ?>
                <?php remplaceID("Déconnexion", "disconnect.php"); ?>
            </div>
            <span style="font-size:30px;" onclick="openNav()">
                    <i class="fa fa-user-circle fa-2x logomain" aria-hidden="true"></i>
                </span>
            <script>
                function openNav() {
                    document.getElementById("déroul").style.width = "250px";
                }

                function closeNav() {
                    document.getElementById("déroul").style.width = "0";
                }
            </script>
        </div>
    </div>
    <div id="header_title">
        <div id="header_title_img">
            <img src=../img_docs/logo.png alt="logo">
        </div>
        <a href="accueil.php">
            <div id="header_h1">
                <h1>Smart Your Future</h1>
            </div>
        </a>
    </div>
    <div id="header_lien">
        <div id="header_lien_grid1">
            <form method="post">
                <i id="header_absolute" class="fa fa-search" aria-hidden="true">
                    <input id="header_submit" autocomplete="off" type="submit">
                </i>
                <input type="search" id="recherche">
                <label for="recherche">
                    <i class="fa fa-microphone" aria-hidden="true"></i>
                </label>
            </form>
        </div>
        <?php
        if (isset($_SESSION['id'])) {
            ?>
            <div id="header_lien_button">
                <button id="buttonl"><a href="disconnect.php">Déconexion</a> </button>
            </div>
            <?php
        } else {
            echo '';
        }
        ?>
        <?php
        if (isset($_SESSION['id'])) {
        ?>
        <a href="panier.php"><i id="header_panier" class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i></a>
    </div>
    <?php
    } else {
        echo '';
    }
    ?>
</header>


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
<input type="text" id="register_text" style="background-color: red">
<input type="submit" id="clike" style="background-color: #9a6d6d">
<?php

    var_dump( $_POST['input']);

?>

<footer>
    <div id="footerdiv1">
        <i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i>
        <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>
        <i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i>
        <i class="fa fa-paypal fa-3x" aria-hidden="true"></i>
        <i class="fa fa-cc-visa fa-3x" aria-hidden="true"></i>
        <i class="fa fa-cc-mastercard fa-3x" aria-hidden="true"></i>
    </div>
    <div id="footerdiv2">
        <div id="footerdiv3">
            <p>Evan Azemard</p>
            <p>Copyright 2021 © Smart Your Future</p>
            <p>Clément Nahmens</p>
        </div>

    </div>
</footer>
</body>
</html>
<script type="text/javascript" src="register.js"></script>


