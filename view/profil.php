<?php session_start();
require_once('../library/fonctions.php');
require ('../php/Profil.php');

if (empty($_SESSION['id'])) {
    header("Location: accueil.php");
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
            <div id="d??roul" class="DEL" style="overflow: auto; min-height: 85%;">
                <a href="#" class="fermer" onclick="closeNav()">??</a>
                <a class="colorlien" href="accueil.php">Accueil</a>
                <?php remplaceRIEN("Inscription", "register.php"); ?>
                <?php remplaceRIEN("Connexion", "login.php"); ?>
                <?php remplaceID("Profil", "profil.php"); ?>
                <a class="colorlien" href="produit.php">D??couvrer nos produits</a>
                <?php remplacev("Ajouter un article", "ajout.php"); ?>
                <?php remplacev("Historique de vente", "historique_vendeur.php"); ?>
                <?php remplacev("Messagerie", "mail.php"); ?>
                <?php remplaceID("Historique des commandes", "historique_commende.php"); ?>
                <?php remplaceID("Panier", "panier.php"); ?>
                <?php remplaceAd("Admin", "admin.php"); ?>
                <?php remplaceAdd("G??rant", "gerant.php"); ?>
                <?php remplaceID("D??connexion", "disconnect.php"); ?>
            </div>
            <span style="font-size:30px;" onclick="openNav()">
                    <i class="fa fa-user-circle fa-2x logomain" aria-hidden="true"></i>
                </span>
            <script>
                function openNav() {
                    document.getElementById("d??roul").style.width = "250px";
                }

                function closeNav() {
                    document.getElementById("d??roul").style.width = "0";
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
                <button id="buttonl"><a href="disconnect.php">D??conexion</a> </button>
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


<main id="profil_main">
    <?php include 'error.php'; ?>
    <section id="section_profil">
        <form method="POST" id="profil_form">
            <article id="register_form_article1">
                <h2>Profil de <?php echo  Htmlspecialchars($_SESSION["pseudo"]); ?></h2>
            </article>
            <article id="register_form_article2">
                <div class="register_form_contient">
                    <div class="register_labput">
                        <label class="profil_invi" for="pseudo"> Pseudo</label>
                        <input type="text" minlength="4" placeholder="<?= Htmlspecialchars($_SESSION['pseudo']) ?> (pseudo)" name="pseudo" maxlength="12" id="pseudo">
                    </div>
                    <div class="register_labput">
                        <label class="profil_invi" for="t??l??phone">T??l??phone</label>
                        <div id="telregister">
                            <p>+33</p>
                        </div>
                        <input type="number" name="tel" placeholder="<?= Htmlspecialchars($_SESSION['tel']) ?>(t??l??phone)" maxlength="9" minlength="9" id="t??l??phone">
                    </div>
                </div>
                <div class="register_form_contient">
                    <div class="register_labput">
                        <label class="profil_invi" for="password">Mot de passe</label>
                        <input type="password" placeholder="password" name="password" minlength="12" maxlength="40" id="password">
                    </div>
                    <div class="register_labput">
                        <label class="profil_invi" for="email">Email</label>
                        <input type="email" minlength="9" placeholder="<?= Htmlspecialchars($_SESSION['email']) ?>(email)" name="email" maxlength="35" id="email">
                    </div>
                </div>
                <div class="register_form_contient">
                    <div class="register_labput">
                        <label class="profil_invi" for="confirme_password">Confirmation du mot de passe</label>
                        <input type="password" placeholder="confirmer password" name="r_password" minlength="12" maxlength="40" id="confirme_password">
                    </div>
                    <div class="register_labput">
                        <label class="profil_invi" for="age">??ge</label>
                        <input type="number" name="age" placeholder="<?= Htmlspecialchars($_SESSION['age']) ?>(age)" minlength="13" maxlength="115" id="age">
                    </div>
                </div>
                <div class="register_form_contient">
                    <div class="register_labput">
                        <label class="profil_invi" for="prenom">Pr??nom</label>
                        <input type="text" name="prenom" placeholder="<?= Htmlspecialchars($_SESSION['prenom']) ?>(pr??nom)" maxlength="12" min="3" id="prenom">
                    </div>
                    <div class="register_labput register_labput_login">
                        <label class="profil_invi" for="adresse">Nouvelle adresse compl??te</label>
                        <input type="text" name="adresse" placeholder="<?= Htmlspecialchars($_SESSION['adresse']) ?>(adresse)" minlength="20" maxlength="80" id="adresse">
                    </div>
                </div>
                <div class="register_form_contient">
                    <div class="register_labput">
                        <label class="profil_invi" for="nom">Nom</label>
                        <input type="text" name="nom" placeholder="<?= Htmlspecialchars($_SESSION['nom']) ?>(nom)" maxlength="15" min="3" id="nom">
                    </div>
                </div>
            </article>
            <article id="register_form_article3_button" style="display: flex; flex-direction: column; align-content: center">
                <div class="button_profil_text">
                    <input type="submit" class="button marg" value="Valider les choix" name="submit">
                </div>
                <div class="button_profil_text">
                    <p>Modifier uniquement les champs que vous avez besoin. Cette action est ir??verssible ! </p>
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
            <p>Copyright 2021 ?? Smart Your Future</p>
            <p>Cl??ment Nahmens</p>
        </div>

    </div>
</footer>
</body>
</html>
<script type="text/javascript" src="autocompletion.js"></script>


