<?php
if (empty($_SESSION['id'])) {
    header("Location: login");
}
?>
<?php
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
}elseif (empty($_POST['Valider'])){
    $articles_model = $user->valider();
}
if (isset($_POST['Supprimer'])){

    $user->supprimer($_POST['idprod']);
}
?>


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
                                        <button><a href="contact?id_produit=<?= Htmlspecialchars($article['id_produit'])?>">Contacter</a></button>
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