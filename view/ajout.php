<!--Ajouter un produit-->
<?php
if (empty($_SESSION['id'])){
        header("Location: accueil");
}
if ($_SESSION['rank'] == 3 ){
    header("Location: accueil");
}
if ($_SESSION['rank'] == 1 ){
    header("Location: accueil");
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
            $pst['resum'],$pst['description'],$pst['systeme'],$pst['interface_utilisateur'],
            $pst['ratio'],$pst['luminosite'],$pst['puce_graphique'],$pst['ram'],
            $pst['memoire_flash'],$pst['dast'],$pst['dastr'],$pst['dasm'],$pst['double_sim'],
            $pst['taile'],$pst['type_ecran'],$pst['definition_ecran'],$pst['batterie'],
            $pst['nb_capteur'],$pst['taile_gravure'],$pst['nom'],$pst['marque'],$pst['number'],$pst['prix'],$_SESSION['id'],
            $pst['resolution_ecran']);
        }
    } else
    {
        ?> <script> alert('Il faut être vendeur !') </script><?php
    }
} else
{
    $errors = array();
}
?>
<main id="ajout_main">
    <div><h1>Ajouter un article</h1></div>
<?php include 'error.php'; ?>
    <section>
        <form method="post" enctype="multipart/form-data">
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="resum">Résumé :</label>
                    </div>
                    <div class="ajout_2">
                        <textarea id="resum"  placeholder="Le résumé doit faire au moins 50 caractére" required name="resum" maxlength="220"  minlength="50" <?php if (!empty($_POST['resum'])){ ?>style="color: red"<?php };?>><?php if (!empty($_POST['resum'])){ echo $_POST['resum'];}?></textarea>
                    </div>
                </div>
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="description">Description :</label>
                    </div>
                    <div class="ajout_2">
                        <textarea id="description" placeholder="La description doit faire au moins 200 caractére " required name="description"  maxlength="800" minlength="200"  <?php if (!empty($_POST['description'])){ ?>style="color: red"<?php };?>><?php if (!empty($_POST['description'])){ echo $_POST['description'];}?></textarea>
                    </div>
                </div>
            </article>
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="systeme">Système :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text" <?php if (!empty($_POST['systeme'])){ ?>style="color: red"  value="<?php echo $_POST['systeme'] ?>"<?php ;}?>  placeholder="Ex: Android 10" maxlength="50" minlength="3" name="systeme" id="systeme">
                    </div>
                </div>
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="interface_utilisateur">Interface utilisateur :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text" <?php if (!empty($_POST['interface_utilisateur'])){ ?>style="color: red"  value="<?php echo $_POST['interface_utilisateur'] ?>"<?php ;}?>  maxlength="50" placeholder="Ex: OxygenOS"  minlength="3" name="interface_utilisateur" id="interface_utilisateur">
                    </div>
                </div>
            </article>
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="resolution_ecran">Résolution de l'écran :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text"  <?php if (!empty($_POST['resolution_ecran'])){ ?>style="color: red"  value="<?php echo $_POST['resolution_ecran'] ?>"<?php ;}?>  minlength="2" placeholder="Ex: 800 ppi." maxlength="20" name="resolution_ecran" id="resolution_ecran">
                    </div>
                </div>
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="ratio">Ratio taille écran  :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="number" <?php if (!empty($_POST['ratio'])){ ?>style="color: red"  value="<?php echo $_POST['ratio'] ?>"<?php ;}?>   placeholder="Uniquement la valeur ex: 98" minlength="15" maxlength="200" name="ratio" id="ratio">
                    </div>
                </div>
            </article>
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="luminosite">Luminosité en cd/m2 :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="number"  <?php if (!empty($_POST['luminosite'])){ ?>style="color: red"  value="<?php echo $_POST['luminosite'] ?>"<?php ;}?>  placeholder="Uniquement la valeur, ex: 600" required maxlength="1600" minlength="200" name="luminosite" id="luminosite">
                    </div>
                </div>
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="puce_graphique">Puce graphique :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text" <?php if (!empty($_POST['puce_graphique'])){ ?>style="color: red"  value="<?php echo $_POST['puce_graphique'] ?>"<?php ;}?>  placeholder="Ex: qualcomm snapdragon 888 Plus" required  minlength="3" maxlength="40" name="puce_graphique" id="puce_graphique">
                    </div>
                </div>
            </article>
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="ram">Ram :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="number" <?php if (!empty($_POST['ram'])){ ?>style="color: red"  value="<?php echo $_POST['ram'] ?>"<?php ;}?>  placeholder="Uniquement la valeur ex: 8" required minlength="3" maxlength="35" name="ram" id="ram">
                    </div>
                </div>
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="memoire_flash">Mémoire flash :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="number" <?php if (!empty($_POST['memoire_flash'])){ ?>style="color: red"  value="<?php echo $_POST['memoire_flash'] ?>"<?php ;}?>  placeholder="Uniquement la valeur ex: 256" required minlength="30" maxlength="2000" name="memoire_flash" id="memoire_flash">
                    </div>
                </div>
            </article>
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="dast">DAS tête:</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text" <?php if (!empty($_POST['dast'])){ ?>style="color: red"  value="<?php echo $_POST['dast'] ?>"<?php ;}?>  placeholder="Uniquement la valeur, ex: 0.60" required minlength="0" maxlength="4" name="dast"  id="dast">
                    </div>
                </div>
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="dastr">DAS tronc:</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text" <?php if (!empty($_POST['dastr'])){ ?>style="color: red"  value="<?php echo $_POST['dastr'] ?>"<?php ;}?>   placeholder="Uniquement la valeur, ex: 0.60" required minlength="0" maxlength="4"  name="dastr" id="dastr">
                    </div>
                </div>
            </article>
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="dasm">DAS membre :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="number" <?php if (!empty($_POST['dasm'])){ ?>style="color: red"  value="<?php echo $_POST['dasm'] ?>"<?php ;}?>   placeholder="Uniquement la valeur, ex: 0.60" required minlength="0" maxlength="8" name="dasm" id="dasm">
                    </div>
                </div>
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="double_sim">Double sim :</label>
                    </div>
                    <div class="double_sim">
                        <select name="double_sim"  id="double_sim">
                            <option name="double_sim" value="oui">Oui</option>
                            <option name="double_sim" value="non">Non</option>
                        </select>
                    </div>
                </div>
            </article>
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="taille">Taille :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text" <?php if (!empty($_POST['taile'])){ ?>style="color: red"  value="<?php echo $_POST['taile'] ?>"<?php ;}?>  placeholder="Uniquement la valeur, ex: 6.6" required maxlength="8,5" name="taile" id="taille">
                    </div>
                </div>
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="type_ecran">Type d'écran :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text"  <?php if (!empty($_POST['type_ecran'])){ ?>style="color: red"  value="<?php echo $_POST['type_ecran'] ?>"<?php ;}?>  placeholder="Ex: Poled" required minlength="3" maxlength="35"  name="type_ecran" id="type_ecran">
                    </div>
                </div>
            </article>
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="definition_ecran">Définition de l'écran :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text" <?php if (!empty($_POST['definition_ecran'])){ ?>style="color: red"  value="<?php echo $_POST['definition_ecran'] ?>"<?php ;}?>  placeholder="Exemple: HD/FHD/UHD/..." required minlength="2" maxlength="6" name="definition_ecran" id="definition_ecran">
                    </div>
                </div>
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="batterie">Batterie :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="number" <?php if (!empty($_POST['batterie'])){ ?>style="color: red"  value="<?php echo $_POST['batterie'] ?>"<?php ;}?>  placeholder="La valeur (mAh) ex: 2800" required minlength="1500" maxlength="18000" name="batterie" id="batterie">
                    </div>
                </div>
            </article>
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="nb_capteur">Nombre de capteur :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="number" <?php if (!empty($_POST['nb_capteur'])){ ?>style="color: red"  value="<?php echo $_POST['nb_capteur'] ?>"<?php ;}?>  placeholder="Ex: 1" minlength="1" maxlength="15" name="nb_capteur" id="nb_capteur">
                    </div>
                </div>
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="taile_gravure">Taille de la gravure :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text" <?php if (!empty($_POST['taile_gravure'])){ ?>style="color: red"  value="<?php echo $_POST['taile_gravure'] ?>"<?php ;}?>  placeholder="Exemple: 4.55 nm" minlength="1" maxlength="15" name="taile_gravure" id="taile_gravure">
                    </div>
                </div>
            </article>
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="nom_model">Nom du model :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text" <?php if (!empty($_POST['nom'])){ ?>style="color: red"  value="<?php echo $_POST['nom'] ?>"<?php ;}?>  placeholder="Exemple: Wigo" required minlength="3" maxlength="40" name="nom"  id="nom_model">
                    </div>
                </div>
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="marque_model">Marque du model :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text" <?php if (!empty($_POST['marque'])){ ?>style="color: red"  value="<?php echo $_POST['marque'] ?>"<?php ;}?>  placeholder="Exemple: Aria 6 Plus" required minlength="3" maxlength="40" name="marque"  id="marque_model">
                    </div>
                </div>
            </article>
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="nb_stock">Nombre en stock :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="number" <?php if (!empty($_POST['number'])){ ?>style="color: red"  value="<?php echo $_POST['number'] ?>"<?php ;}?>  placeholder="Exemple: 35000" required minlength="1" maxlength="40000" name="number"  id="nb_stock">
                    </div>
                </div>
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="prix_article">Prix de l'article :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="text" <?php if (!empty($_POST['prix'])){ ?>style="color: red"  value="<?php echo $_POST['prix'] ?>"<?php ;}?>  placeholder="Uniquement la valeur en €, ex: 1500" required  name="prix"  id="prix_article">
                    </div>
                </div>
            </article>
            <article class="ajout_article">
                <div class="article_rectangle">
                    <div class="ajout_1">
                        <label for="image_ajout">Image :</label>
                    </div>
                    <div class="ajout_2">
                        <input type="file" <?php if (!empty($_POST['imageplod'])){ ?>style="color: red"  value="<?php echo $_POST['imageplod'] ?>"<?php ;}?>  placeholder="Uniquement les images de moins de 650ko" required name="imageplod" id="image_ajout">
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




