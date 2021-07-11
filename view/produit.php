<?php session_start();
if (empty($_SESSION['id'])) {
    header("Location: login.php");
}
require_once('../library/fonctions.php');
require ('../php/Produit.php');



if (isset($_POST['ppan'])) {
    $user = new C_produit();
    $errors = $user->produit($_POST['idppa'], $_POST['prix']);
} else {
    $errors = array();
}
$user = new C_produit();
$user->redelette();
$user->logoA();

if (isset($_POST['Valider'])){
    $articles_model = $user->validerV($_POST['prix1'],$_POST['prix2']);

    if ($articles_model == NULL){
        $te = "<p id='aucun_produit'>Aucun résulat trouvé</p>";
    }
}elseif (empty($_POST['Valider'])){
    $articles_model = $user->valider();
}
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




<main id="produit_main">
    <!--Affiche produit par section-->
    <div class="produit_h1 banderole">
        <h1>Découvrer nos produits</h1>
    </div>
    <section id="info_produit">
        <article id="info_produit_art1">
            <p>Rechercher par catégorie: </p>
            <nav id="wrap">
                <ul class="navbar">
                    <li>
                        <a class="ali" href="#">Catégorie</a>
                        <ul>
                            <?php
                            $categorieS = categorieS();

                            foreach ($categorieS as $categories)
                            {
                                ?>
                                <li><a class="ali" href="#<?= $categories['categorie']?>"><?= $categories['categorie']?></a></li> <?php
                            }

                            ?>
                        </ul>
                    </li>
                </ul>
            </nav>
        </article>
        <article id="info_produit_art2">
            <p>Rechercher dans votre fourchette de prix:</p>
            <div id="info_produit_art3">
                <form id="info_produit_art3" method="post">
                    <input id="prix1"  name="prix1" aria-label="number" type="number" minlength="1" placeholder="50 (€)">
                    <input id="prix2" name="prix2" aria-label="number" type="number" minlength="1" placeholder=" 4000 (€)">
                    <input  type="submit" id="vprix" value="Valider" name="Valider">
                </form>
            </div>
        </article>
    </section>
    <section>
        <article class="articlegrid">
            <?php
            if ($articles_model == NULL){
                echo $te;
            }
            foreach ($articles_model as $tab) {
                $model = $tab['marque_model'];

                 if (isset($_POST['Valider']))
                {
                    $articles = article_produitV($model,$_POST['prix1'],$_POST['prix2']);
                }elseif (empty($_POST['Valider'])) {
                    $articles = article_produit($model);
                 }
                    $categories = categorie($model);


                foreach ($categories as $categorie)
                { ?>
                    <div  id="<?=  $categorie['categorie'] ?>" class="produit_h1">
                    <h1>
                    <?php echo $categorie['categorie'];
                }?>
                <?= Htmlspecialchars($tab['marque_model']); ?>
                </h1>
                </div>
                <div id="flexcard">
                    <div class="grid">
                        <div class="gridproduit">
                            <?php foreach ($articles as $article) { ?>
                                <article class="body_cards">
                                    <div class="cards_img">
                                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($article['bin_img']) . '"  alt="mon image" title="image"/>'; ?>
                                    </div>
                                    <div class="cards_des">
                                        <h3>
                                            <?php
                                            $str = strlen($article['nom_model']);
                                            if (strlen($str > 12)) {
                                                $tt = substr($article['nom_model'], 0, 25) . '...';
                                                echo  Htmlspecialchars($tt);
                                            } else {
                                                echo Htmlspecialchars($article['nom_model']);
                                            } ?>
                                        </h3>
                                        <p> <?php

                                            $t = strlen($article['resum']);

                                            $tt = substr($article['resum'], 0, 120);


                                            $a = substr($tt, 0, 40);
                                            $b = substr($tt, 40, 40);
                                            $c = substr($tt, 80, 40);
                                            $d = substr($tt, 120, 40);
                                            $e = substr($tt, 160, 40);


                                            echo Htmlspecialchars($a) . "<br/>" . Htmlspecialchars($b) . "<br/>" . Htmlspecialchars($c) . "<br/>" . Htmlspecialchars($d) . "<br/>" . Htmlspecialchars($e) . "<br/>";

                                            ?></p>
                                    </div>
                                    <div class="cards_logo">
                                        <form method="post" style="display: flex">
                                            <?php
                                            if ($_SESSION['rank'] == 1 || $_SESSION['rank'] == 2)
                                            {
                                                ?>
                                            <input style="cursor: pointer" type="submit" name="ppan" value="Ajouter">
                                                <?php
                                            }else{
                                                ?>
                                                <input style="cursor: pointer" type="submit" name="Supprimer" value="Supprimer">
                                                <input type="text" style="display: none" name="idprod" value="<?= $article['id_produit']?>">
                                            <?php
                                            }
                                            ?>
                                            <input type="text" aria-label="pasID" name="idppa" value="<?= Htmlspecialchars($article['id_produit']) ?>" style="display: none">
                                            <input type="text" aria-label="pasprix" id="prix" name="prix" value="<?= Htmlspecialchars($article['prix_article'])?>" style="display: none">
                                        </form>

                                        <p><?= Htmlspecialchars($article['prix_article'])?> €</p>
                                        <p><?= Htmlspecialchars($article['code'])?></p>
                                        <button><a href="contact.php?id_produit=<?= Htmlspecialchars($article['id_produit'])?>">Contacter</a></button>
                                    </div>
                                </article>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="traimoyen"></div>
                <?php
            } ?>
        </article>
    </section>
</main>
<!--                                    <a href="contact?id_produit=<?/*= $article['id_produit']*/ ?>&?id_vendeur=<?/*= $article['id_venduer']*/ ?>&?id_client=<?/*= $_SESSION['id']*/ ?>">Contacter</a>
-->

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


