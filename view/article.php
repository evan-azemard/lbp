<!--Afficher article prècis-->
<?php
if (empty($_SESSION['id'])){
    header("Location: login");
}
?>
<?php
if ($_GET['id']) {
    $user = new C_article();
    $errors = $user->article($_GET['id']);
} else {
    $errors = array();
}
?>


<main id="article_main" xmlns="http://www.w3.org/1999/html">
    <section id="article_section1">
        <div id="art_section1_article1">
            <article id="art_sec1_art1_img">
                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($_SESSION['bin_img']) . '"  alt="mon image" title="image"/>'; ?>
            </article>
            <article id="art_sec1_art1_txt">
                <div id="art1_texth1">
                    <h1><?= $_SESSION['nom'] ?></h1>
                </div>
                <div id="art1_textp">
                    <p>
                        <?php

                        $t = strlen($_SESSION['resum']);
                        if ($t > 201) {
                            $tt = htmlspecialchars(substr($_SESSION['resum'], 0, 220) . '[...]', ENT_QUOTES);
                        } else {
                            $tt =  htmlspecialchars($_SESSION['resum'], ENT_QUOTES);
                        }

                        $a = substr($tt, 0, 40);
                        $b = substr($tt, 40, 40);
                        $c = substr($tt, 80, 40);
                        $d = substr($tt, 120, 40);
                        $e = substr($tt, 160, 40);
                        $f = substr($tt, 200, 220);

                        echo $a . "<br/>" . $b . "<br/>" . $c . "<br/>" . $d . "<br/>" . $e . "<br/>" . $f . "<br/>";
                        ?>
                    </p>
                </div>
            </article>
        </div>
        <div id="art_section1_article3">
            <div id="art_section1_art3_info1" class="article_info">
                <h3>Vendu par <span id="art_info_vendeur"><?= htmlspecialchars($_SESSION['nom_vendeur']) ?></span></h3>
            </div>
            <div id="art_section1_art3_info2" class="article_info">
                <form method="post" id="form_art_grid">
                    <label for="art_number">ajouter au panier</label>
                    <input id="art_number" type="number" min="1" value="1" max="500">
                </form>
            </div>
            <div id="art_section1_art3_info3" class="article_info">
                <p><span id="chiffre_art_info3"><?= htmlspecialchars($_SESSION['nb_stock']) ?></span> en stock</p>
            </div>
            <div id="art_section1_art3_info4" class="article_info">
                <p>Prix unitaire <span id="art_prix"><?= htmlspecialchars($_SESSION['prix_article']) ?>€</span></p>
            </div>
        </div>
    </section>
    <section id="article_section2">
        <article id="art_section2_1">
            <div class="art_section2_1_ligne">
                <p>Marque du model</p>
                <p class="des"><?= htmlspecialchars($_SESSION['marque']) ?></p>
            </div>
            <div class="art_section2_1_ligne">
                <p>Nom du model</p>
                <p class="des"><?= htmlspecialchars($_SESSION['nom']) ?></p>
            </div>
            <div class="art_section2_1_ligne">
                <p>Système</p>
                <p class="des"><?php
                                if (empty(htmlspecialchars($_SESSION['systeme']))) {
                                    echo "non renseigné";
                                } elseif (!empty(htmlspecialchars($_SESSION['systeme']))) {
                                    echo htmlspecialchars($_SESSION['systeme']);
                                }


                                ?></p>
            </div>
            <div class="art_section2_1_ligne">
                <p>Puce graphique</p>
                <p class="des"><?= htmlspecialchars($_SESSION['puce_graphique']) ?></p>
            </div>
            <div class="art_section2_1_ligne">
                <p>Batterie</p>
                <p class="des"><?= htmlspecialchars($_SESSION['batterie']) ?></p>
            </div>
            <div class="art_section2_1_ligne">
                <p>Nombre de capteur</p>
                <p class="des"><?php
                                if (empty(htmlspecialchars($_SESSION['nb_capteur']))) {
                                    echo "non renseigné";
                                } elseif (!empty(htmlspecialchars($_SESSION['nb_capteur']))) {
                                    echo htmlspecialchars($_SESSION['nb_capteur']);
                                }
                                ?></p>
            </div>
            <div class="art_section2_1_ligne">
                <p>Type d'écran</p>
                <p class="des"><?= htmlspecialchars($_SESSION['type_ecran']) ?></p>
            </div>
            <div class="art_section2_1_ligne">
                <p>Définition d'écran</p>
                <p class="des"><?php
                                if (empty(htmlspecialchars($_SESSION['definition_ecran']))) {
                                    echo "non renseigné";
                                } elseif (!empty(htmlspecialchars($_SESSION['definition_ecran']))) {
                                    echo htmlspecialchars($_SESSION['definition_ecran']);
                                } ?></p>
            </div>
            <div class="art_section2_1_ligne">
                <p>Interface utilisateur</p>
                <p class="des"> <?php

                                if (empty(htmlspecialchars($_SESSION['interface_utilisateur']))) {
                                    echo "non renseigné";
                                } elseif (!empty(htmlspecialchars($_SESSION['interface_utilisateur']))) {
                                    echo htmlspecialchars($_SESSION['interface_utilisateur']);
                                }
                                ?> </p>
            </div>
            <div class="art_section2_1_ligne">
                <p>Mémoire flash</p>
                <p class="des"><?= htmlspecialchars($_SESSION['memoire_flash']) ?></p>
            </div>
            <div class="art_section2_1_ligne">
                <p>Ram</p>
                <p class="des"><?= htmlspecialchars($_SESSION['ram']) ?></p>
            </div>
            <div class="art_section2_1_ligne">
                <p>Mémoire flash</p>
                <p class="des"><?= htmlspecialchars($_SESSION['memoire_flash']) ?></p>
            </div>
            <div class="art_section2_1_ligne">
                <p>DAS tête</p>
                <p class="des"><?= htmlspecialchars($_SESSION['dast'])  ?></p>
            </div>
            <div class="art_section2_1_ligne">
                <p>DAS corps</p>
                <p class="des"><?= htmlspecialchars($_SESSION['dastr']) ?></p>
            </div>
            <div class="art_section2_1_ligne">
                <p>DAS membre</p>
                <p class="des"><?= htmlspecialchars($_SESSION['dasm']) ?></p>
            </div>
            <div class="art_section2_1_ligne">
                <p>Taille de la gravure</p>
                <p class="des"><?= htmlspecialchars($_SESSION['taile_gravure']) ?></p>
            </div>
            <div class="art_section2_1_ligne">
                <p>Taille</p>
                <p class="des"><?php

                                if (empty(htmlspecialchars($_SESSION['taile']))) {
                                    echo "non renseigné";
                                } elseif (!empty(htmlspecialchars($_SESSION['taile']))) {
                                    echo htmlspecialchars($_SESSION['taile']);
                                }


                                ?></p>
            </div>
            <div class="art_section2_1_ligne">
                <p>Ratio</p>
                <p class="des"><?php
                                if (empty(htmlspecialchars($_SESSION['ratio']))) {
                                    echo "non renseigné";
                                } elseif (!empty(htmlspecialchars($_SESSION['ratio']))) {
                                    echo htmlspecialchars($_SESSION['ratio']);
                                }
                                ?></p>
            </div>
        </article>
        <article id="art_section2_2">
            <p>
                <?php

                $t = strlen($_SESSION['description']);
                if ($t > 800) {
                    $tt = htmlspecialchars(substr($_SESSION['description'], 0, 801) . '[...]', ENT_QUOTES);
                } else {
                    $tt =  htmlspecialchars($_SESSION['description'], ENT_QUOTES);
                }
                $a = substr($tt, 0, 30);
                $b = substr($tt, 30, 60);
                $c = substr($tt, 60, 90);
                $d = substr($tt, 90, 120);
                $e = substr($tt, 120, 150);
                $f = substr($tt, 150, 180);
                $g = substr($tt, 180, 210);
                $h = substr($tt, 210, 240);
                $i = substr($tt, 240, 270);
                $j = substr($tt, 270, 300);
                $k = substr($tt, 300, 330);
                $l = substr($tt, 360, 390);
                $m = substr($tt, 390, 420);
                $n = substr($tt, 420, 450);

                echo $a . "<br/>" . $b . "<br/>" . $c . "<br/>" . $d . "<br/>" . $e . "<br/>" . $f . "<br/>" . "<br/>"
                    . $g . "<br/>" . $h . "<br/>" . $i . "<br/>" . $j . "<br/>" . $k . "<br/>" . $l . "<br/>" . $m . "<br/>" . $n . "<br/>";

                ?>
            </p>
        </article>
    </section>
    <div class="traimoyen"></div>
    <section id="article_section3">
        <article id="art1_art1">
            <label for="select_art">Noter l'article !</label>
        </article>
        <article id="art1_art2">
            <form method="post">
                <select id="select_art">
                    <option value="1">* Très mauvais</option>
                    <option value="2">** Mauvais</option>
                    <option value="3">*** Bon</option>
                    <option value="4">**** Très bon</option>
                </select>
            </form>
        </article>
        <article id="art1_art3">
            <p>La note de cet article est de <span id="artcouleurgrs">90/100</span></p>
        </article>
    </section>
</main>

<!--