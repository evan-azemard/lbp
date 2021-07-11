<?php session_start();
require_once('../library/fonctions.php');
require ('../php/historique_vendeur.php');

if (empty($_SESSION['id'])) {
    header("Location: accueil.php");
}
if ($_SESSION['rank'] == 3) {
    header("Location: accueil.php");
}
if ($_SESSION['rank'] == 1) {
    header("Location: accueil.php");
}

$user = new C_historique_vendeur();
$sel = $user->selecthistorique_vendeur();

if (isset($_POST['prod_sub'])){
    $user->modifhistorique_vendeur($_POST['prix'],$_POST['valeur']);
}

if (isset($_POST['prod_sup'])){
    $user->supphistorique_vendeur($_POST['valeur']);
}
$user->logoA();

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



<main id="historiquev_main">
    <div id="historiquev_main_info">
        <div id="historiquev_main_info_titre">
            <h1>Vos produits en vente</h1>
        </div>
    </div>
    <section id="historique_vendeur_section">
        <?php foreach ($sel as $key){
            ?>

            <div class="prod_vendeur">
                <div class="prod_div2">
                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($key['bin_img']) . '"  alt="mon image" title="image"/>'; ?>
                </div>
                <form class="prod_div3" method="post">
                    <div class="prod_divdiv1">
                        <div class="prod_divdiv1h1">
                            <h2><?= Htmlspecialchars($key['nom_model']) ?></h2>
                        </div>
                    </div>
                    <div class="prod_divdiv2">
                        <div class="prod_divdiv23">
                            <p><?= Htmlspecialchars($key['prix_article']) ?> €</p>
                        </div>
                    </div>
                    <div class="prod_divdiv3">
                        <div class="prod_form">
                            <label for="modif_prix" class="labelprod">Modifier le prix : </label>
                            <input id="modif_prix" type="number" name="prix" minlength="1" maxlength="500000" placeholder="Modifier le prix">
                            <input type="text" aria-label="idproduit" name="valeur" value="<?= Htmlspecialchars($key['id_produit'])?>"style="display: none">
                        </div>
                    </div>
                    <div class="prod_divdiv4">
                        <div class="prod_form">
                            <input type="submit"  name="prod_sub" class="prod_sub" value="Modifier" style="cursor: pointer">
                        </div>
                        <div class="prod_form">
                            <input type="submit" name="prod_sup" class="prod_sup" value="Supprimer" style="cursor: pointer">
                        </div>
                    </div>
                </form>
            </div>
            <div class="traimoyen3"></div>
            <?php

        }?>
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


