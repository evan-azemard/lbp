<!--lOGIN PAGE-->
<?php
if (empty($_SESSION['id'])){
    header("Location: accueil");
}
?>
<?php
if ($_GET['id_produit'])
{
    if (!empty($_POST['com']))
    {
        $user = new C_contact();
        $errors = $user->contactF($_GET['id_produit'],$_POST['com']);
    } else
    {
        $errors = array();
    }
}


?>
<main id="login_main">
    <?php include 'error.php'; ?>
    <section id="section_login">
        <form method="post" id="cont_form">
            <article class="login_article_button">
                <div class="login_labput_button">
                    <p id="lolo">Contacter le vendeur</p>
                </div>
            </article>
            <article class="login_article">
                <div class="radio">
                    <textarea aria-label="text" id="com" name="com" placeholder="Votre message"></textarea>
                </div>
            </article>
            <article class="login_article_button">
                <div class="login_labput_button">
                    <input type="submit" class="button" value="Valider les choix" name="submit">
                </div>
            </article>
        </form>
    </section>
</main>