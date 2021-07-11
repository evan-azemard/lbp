<?php session_start();
require_once('../library/fonctions.php');
require ('../php/Ajout.php');

if (empty($_SESSION['id'])){
        header("Location: accueil.php");
}
if ($_SESSION['rank'] == 3 ){
    header("Location: accueil.php");
}
if ($_SESSION['rank'] == 1 ){
    header("Location: accueil.php");
}


if(isset($_POST["submit"]))
{
    if (isset($_SESSION['rank']))
    {
        if (!empty($_FILES))
        {
            $img = $_FILES["imageplod"];
            $pst = $_POST;
            $user = new C_ajout();
            $errors = $user->ajouter($img['name'],$img['size'],$img['type'],file_get_contents($img['tmp_name']),
            $pst['resum'],$pst['categorie'],$pst['code'],$pst['nom'],$pst['marque'],$pst['prix'],$_SESSION['id']);
        }
    } else
    {
        ?> <script> alert('Il faut être vendeur !') </script><?php
    }
} else
{
    $errors = array();
}
$user = new C_ajout();
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

<!--Ajouter un produit-->

<main id="ajout_main">
    <div><h1>Ajouter un article</h1></div>
<?php include 'error.php'; ?>
    <section>
        <form method="post" enctype="multipart/form-data">
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label class="ajout_invi" for="resum">Résumé :</label>
                    </div>
                    <div class="ajout_2">
                        <textarea id="resum"  placeholder="Le résumé doit faire au moins 50 caractére" required name="resum" maxlength="220"  minlength="20" <?php if (!empty($_POST['resum'])){ ?>style="color: red"<?php };?>><?php if (!empty($_POST['resum'])){ echo Htmlspecialchars($_POST['resum']);}?></textarea>
                    </div>
                </div>
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label class="ajout_invi" for="code">Code postale :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="number" <?php if (!empty($_POST['code'])){ ?>style="color: red"  value="<?php echo Htmlspecialchars($_POST['code']) ?>"<?php ;}?>  placeholder="Exemple: 26120" required minlength="5" maxlength="5" name="code"  id="code">
                    </div>
                </div>
            </article>
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label class="ajout_invi" for="nom_model">Nom du model :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text" <?php if (!empty($_POST['nom'])){ ?>style="color: red"  value="<?php echo Htmlspecialchars($_POST['nom']) ?>"<?php ;}?>  placeholder="Exemple: Wigo" required minlength="3" maxlength="40" name="nom"  id="nom_model">
                    </div>
                </div>
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label class="ajout_invi" for="marque_model">Marque du model :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text" <?php if (!empty($_POST['marque'])){ ?>style="color: red"  value="<?php echo Htmlspecialchars($_POST['marque'])?>"<?php ;}?>  placeholder="Exemple: Aria 6 Plus" required minlength="1" maxlength="40" name="marque"  id="marque_model">
                    </div>
                </div>
            </article>
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label class="ajout_invi" for="categorie">Catégorie :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text" <?php if (!empty($_POST['categorie'])){ ?>style="color: red"  value="<?php echo Htmlspecialchars($_POST['categorie']) ?>"<?php ;}?>  placeholder="Exemple: smartphone" required name="categorie"  id="categorie">
                    </div>
                </div>
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label class="ajout_invi" for="prix_article">Prix de l'article :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text" <?php if (!empty($_POST['prix'])){ ?>style="color: red"  value="<?php echo Htmlspecialchars($_POST['prix']) ?>"<?php ;}?>  placeholder="Uniquement la valeur en €, ex: 1500" required  name="prix"  id="prix_article">
                    </div>
                </div>
            </article>
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label class="ajout_invi" for="image_ajout">Image :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="file" <?php if (!empty($_POST['imageplod'])){ ?>style="color: red"  value="<?php echo Htmlspecialchars($_POST['imageplod']) ?>"<?php ;}?>  placeholder="Uniquement les images de moins de 650ko" required name="imageplod" id="image_ajout">
                    </div>
                </div>
            </article>
            <div id="div_button_article">
                <input type="submit" id="button_article_div" name="submit" class="button">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="reset" id="button_article_div" value="réinitialiser" name="reset" class="button">
            </div>
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


