<?php session_start();
require_once('../library/fonctions.php');
require ('../php/gerant.php');

if (empty($_SESSION['id'])) {
    header("Location: accueil.php");
}
if ($_SESSION['rank'] < 4) {
    header("Location: accueil.php");
}

$user = new C_gerant();
$sel = $user->selectadmin();
$seluser = $user->selectuser();
$selall = $user->selall();

if (isset($_POST['delette']))
{
    $errors = $user->deladmin($_POST['idadmin']);
} else
{
    $errors = array();
}

if (isset($_POST['add'])){

    $user->addadmin($_POST['addadmin']);
}else
{
    $errors = array();
}
if (isset($_POST['deletteall'])){
    $user->userall($_POST['userall']);
}else
{
    $errors = array();
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
                <?php remplaceRIEN("Inscription", "register"); ?>
                <?php remplaceRIEN("Connexion", "login"); ?>
                <?php remplaceID("Profil", "profil"); ?>
                <a class="colorlien" href="produit.php">Découvrer nos produits</a>
                <?php remplacev("Ajouter un article", "ajout"); ?>
                <?php remplacev("Historique de vente", "historique_vendeur"); ?>
                <?php remplacev("Messagerie", "voir"); ?>
                <?php remplaceID("Historique des commandes", "historique_commende"); ?>
                <?php remplaceID("Panier", "panier"); ?>
                <?php remplaceAd("Admin", "admin"); ?>
                <?php remplaceAdd("Gérant", "gerant"); ?>
                <?php remplaceID("Déconnexion", "disconnect"); ?>
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


<main id="gerant_main">
    <section class="gerant_section1" style="overflow:auto;height:  10vh!important">
        <?php include 'error.php'; ?>
        <h1>Supprimer un admin</h1>
        <?php foreach ($sel as $key){ ?>
            <table id="gerant_tabl" >
                <thead>
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Nom
                    </th>
                    <th>
                        Prénom
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= Htmlspecialchars($key['id_user']); ?></td>
                    <td><?= Htmlspecialchars($key['nom']); ?></td>
                    <td><?= Htmlspecialchars($key['prenom']); ?></td>
                </tr>
                </tbody>
            </table>
            <?php
        }
        ?>
    </section>
    <section class="gerant_section2">
        <article>

            <form method="post">
                <div>
                    <label for="idgerant">Id de l'admin à supprimer</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="number" name="idadmin" placeholder="ID :" id="idgerant">
                </div>
                <div>
                    <input type="submit" name="delette" class="button_gerant" value="Valider">
                </div>
            </form>
        </article>
    </section>

    <section class="gerant_section1" style="overflow:auto;height:  10vh!important">
        <?php include 'error.php'; ?>
        <h1>Ajouter un admin</h1>
        <?php foreach ($seluser as $key){ ?>
            <table id="gerant_tabl" >
                <thead>
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Nom
                    </th>
                    <th>
                        Prénom
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= Htmlspecialchars($key['id_user']); ?></td>
                    <td><?= Htmlspecialchars($key['nom']); ?></td>
                    <td><?= Htmlspecialchars($key['prenom']); ?></td>
                </tr>
                </tbody>
            </table>
            <?php
        }
        ?>
    </section>
    <section class="gerant_section2">
        <article>

            <form method="post">
                <div>
                    <label for="idgerant">Id de l'utilisateur à ajouter</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="number" name="addadmin" placeholder="ID :" id="idgerant">
                </div>
                <div>
                    <input type="submit" name="add" class="button_gerant" value="Valider">
                </div>
            </form>
        </article>
    </section>

    <section class="gerant_section1" style="overflow:auto;height:  10vh!important">
        <?php include 'error.php'; ?>
        <h1>Supprimer un compte</h1>
        <?php foreach ($selall as $key){ ?>
            <table id="gerant_tabl" >
                <thead>
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Nom
                    </th>
                    <th>
                        Prénom
                    </th>
                      <th>
                        Rank
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= Htmlspecialchars($key['id_user']); ?></td>
                    <td><?= Htmlspecialchars($key['nom']); ?></td>
                    <td><?= Htmlspecialchars($key['prenom']); ?></td>
                    <td><?= Htmlspecialchars($key['rank']); ?></td>
                </tr>
                </tbody>
            </table>
            <?php
        }
        ?>
    </section>
    <section class="gerant_section2">
        <article>

            <form method="post">
                <div>
                    <label for="idgerant">Id du compte à supprimer</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="number" name="userall" placeholder="ID :" id="idgerant">
                </div>
                <div>
                    <input type="submit" name="deletteall" class="button_gerant" value="Valider">
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


