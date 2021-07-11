<?php session_start();
require_once('../library/fonctions.php');
require ('../php/accueil.php');

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
$user->logoA();
if (isset($_POST['Supprimer'])){
    $user->supprimer($_POST['idprod']);
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


