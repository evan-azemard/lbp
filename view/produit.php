
<?php
if (empty($_SESSION['id'])){
    header("Location: login");
}
?>
<?php
if (isset($_POST['ppan'])){
$user = new C_produit();
    $errors = $user->produit($_POST['idppa'],$_POST['number']);
} else {
    $errors = array();
}?>


<main id="produit_main">
    <!--Affiche produit par section-->
    <div class="produit_h1 banderole">
        <h1>Découvrer nos smartphones</h1>
    </div>
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
                                    <img src="img_docs/exemple.png.jpg" alt="exemple">
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
                                        <input type="submit" name="ppan" value="ajouter">
                                        <input type="number" name="number" class="number" id="number" placeholder="1" value="<?php if (empty($_POST['number'])){echo 1;}?>" min="1" max="500"><label for="number"></label>
                                        <input type="text" aria-label="pasID" name="idppa" value="<?=$article['id_produit']?>" style="display: none">
                                    </form>
                                        <a href="article?id=<?= $article['id_produit']?>"><i class="fa fa-info-circle fa-3x" aria-hidden="true"></i></a>
                                    <p><?= $article['prix_article']?></p>
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