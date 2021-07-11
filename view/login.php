<?php session_start();
require_once('../library/fonctions.php');
require ('../php/Login.php');

if (!empty($_SESSION['id'])){
    header("Location: accueil.php");
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
<?php include 'error.php'; ?>
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
    <link href="https://fonts.googlecapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
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

<!--lOGIN PAGE-->

<main id="login_main">
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
                    <input placeholder="Pseudo" class="logininput" <?php if (!empty($_POST['pseudo'])){ ?>style="color: red"  value="<?php echo Htmlspecialchars($_POST['pseudo']) ?>"<?php ;}?> type="text" name="pseudo" id="pseudo" required>
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
                    <input placeholder="Email" class="logininput" type="email"  <?php if (!empty($_POST['email'])){ ?>style="color: red"  value="<?php echo Htmlspecialchars($_POST['email']) ?>"<?php ;}?> name="email" id="email" required>

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
<script type="text/javascript" src="autocompletion.js"></script>


