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
} ?>


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
                            <li><a class="ali" href="#encre4">Du smartphone au PC</a></li>
                            <li><a class="ali" href="#encre3">Engin motorisé</a></li>
                            <li><a class="ali" href="#encre3">Décoration</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </article>
        <article id="info_produit_art2">
            <p>Rechercher dans votre fourchette de prix:</p>
            <div id="info_produit_art3">
                <input id="prix1" aria-label="number" type="number" minlength="1" placeholder="50 (€)">
                <input id="prix2" aria-label="number" type="number" minlength="1" placeholder=" 4000 (€)">
                <div id="vprix">Valider</div>
            </div>
        </article>
    </section>
    <section>
        <article class="articlegrid">
            <?php
            foreach ($articles_model as $tab) {
                $model = $tab['marque_model'];

                $articles = article_produit($model);
            ?>
                <div class="produit_h1">
                    <h1><?= $tab['marque_model'] ?></h1>
                </div>
                <div id="flexcard">
                    <div class="grid">
                        <?php foreach ($articles as $article) { ?>
                            <article class="produit_card">
                                <div class="card_img">
                                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($article['bin_img']) . '"  alt="mon image" title="image"/>'; ?>
                                </div>
                                <div class="card_description">
                                    <h3>
                                        <?php
                                        $str = strlen($article['nom_model']);
                                        if (strlen($str > 12)) {
                                            $tt = substr($article['nom_model'], 0, 12) . '...';
                                            echo  $tt;
                                        } else {
                                            echo $article['nom_model'];
                                        } ?>
                                    </h3>
                                    <p>
                                        <?php

                                        $t = strlen($article['resum']);

                                        $tt = substr($article['resum'], 0, 120) . '[...]';


                                        $a = substr($tt, 0, 40);
                                        $b = substr($tt, 40, 40);
                                        $c = substr($tt, 80, 40);
                                        $d = substr($tt, 120, 40);
                                        $e = substr($tt, 160, 40);


                                        echo $a . "<br/>" . $b . "<br/>" . $c . "<br/>" . $d . "<br/>" . $e . "<br/>";

                                        ?>
                                    </p>
                                </div>
                                <div class="logo_card">
                                    <form method="post" style="display: flex">
                                        <input style="cursor: pointer" type="submit" name="ppan" value="ajouter">
                                        <input type="text" aria-label="pasID" name="idppa" value="<?= $article['id_produit'] ?>" style="display: none">
                                        <input type="text" aria-label="pasprix" id="prix" name="prix" value="<?= $article['prix_article'] ?>" style="display: none">
                                    </form>

                                    <p><?= $article['prix_article']?>€</p>
                                    <p><?= $article['code']?></p>
                                    <button><a href="contact?id_produit=<?= $article['id_produit']?>&?id_vendeur=<?= $article['id_vendeur']?>">Contacter</a></button>
                                </div>
                            </article>
                        <?php } ?>
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