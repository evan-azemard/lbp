<?php
require('model/accueil.php');

//Plus tard pour afficher les produit phare sur l'accueil
function accueil()
{

    function recent() {

        $articles = article_accueil();

        ?>
            <div class="growflex">
        <section id="accueil_section2">
            <?php
            foreach ($articles as $article)
            {
                ?>
                <article class="body_cards produitcard">
                    <div class="cards_img">
                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($article['bin_img']) . '"  alt="mon image" title="image"/>'; ?>

                    </div>
                    <div class="cards_des">
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
                        <p> <?php

                            $t = strlen($article['resum']);

                            $tt = substr($article['resum'], 0, 120);


                            $a = substr($tt, 0, 40);
                            $b = substr($tt, 40, 40);
                            $c = substr($tt, 80, 40);
                            $d = substr($tt, 120, 40);
                            $e = substr($tt, 160, 40);


                            echo $a . "<br/>" . $b . "<br/>" . $c . "<br/>" . $d . "<br/>" . $e . "<br/>";

                            ?></p>
                    </div>
                    <div class="cards_logo">
                        <form method="post" style="display: flex">
                            <input style="cursor: pointer" type="submit" name="ppan" value="Ajouter">
                            <input type="text" aria-label="pasID" name="idppa" value="<?= $article['id_produit'] ?>" style="display: none">
                            <input type="text" aria-label="pasprix" id="prix" name="prix" value="<?= $article['prix_article'] ?>" style="display: none">
                        </form>

                        <p><?= $article['prix_article']?> €</p>
                        <p><?= $article['code']?></p>
                        <button><a href="contact?id_produit=<?= $article['id_produit']?>">Contacter</a></button>
                    </div>
                </article>


                <?php
            } ?>
        </section>
            </div>
        <?php
    }

    //Template
    $template = 'accueil';
    //Layout (contient header , footer)
    include('view/layout.php');
}
