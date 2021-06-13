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
var_dump($_SESSION['rank']);
?>
<?php
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




