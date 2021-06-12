<?php
if (empty($_SESSION['id'])) {
    header("Location: accueil");
}
if ($_SESSION['rank'] < 3) {
    header("Location: accueil");
}

?>
<main id="admin_main">
   <div class="admin_div">
                        <div class="admin_cont1">
                            <div class="admin_cont1_text">
                                <div class="admin_label">
                                    <p>Nom : <span class="admin_gray"></span> </p>
                                </div>
                                <div class="admin_label">
                                    <p>Prénom : <span class="admin_gray"></span></p>
                                </div>
                                <div class="admin_label">
                                    <p>Id produit : <span class="admin_gray"> </span> </p>
                                </div>
                                <div class="admin_label">
                                    <p>Nom du produit : <span class="admin_gray"></span> </p>
                                </div>
                            </div>
                            <div class="admin_cont1_textarea">
                                <div class="admin_cont_texta">
                                    <p style="display: flex">

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="traimoyen_admin"></div>
                        <div class="admin_cont2">
                            <form class="admin_form" method="post">
                                <textarea aria-label="textarea" name="reponse" class="admin_textarea" placeholder="Méssage de réponse[...]"></textarea>
                                <div class="admin_button">
                                    <input type="submit" class="button" name="submit" value="Envoyer">
                                    <!--                    <input type="submit" class="button" name="signaler" value="Signaler">
                                    -->                </div>
                            </form>
                        </div>
                    </div>
</main>