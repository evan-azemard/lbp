<?php
require('model/admin.php');

function admin()
{
    class C_admin
    {
        public function affiche()
        {
            $admin = seladm();
            if (!empty($admin))
            {
                foreach ($admin as $key)
                {
                    ?>

                    <div class="admin_div">
                        <div class="admin_cont1">
                            <div class="admin_cont1_text">
                                <div class="admin_label">
                                    <p>Email : <span class="admin_gray"><?= $key['email'] ?></span> </p>
                                </div>
                                <div class="admin_label">
                                    <p>Id produit : <span class="admin_gray"> <?= $key['id_produit'] ?></span> </p>
                                </div>
                            </div>
                            <div class="admin_cont1_textarea">
                                <div class="admin_cont_texta">
                                    <p style="display: flex">
                                        <?= $key['message'] ?>
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
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php
                }
            }else
            {
                echo "
                <div class='afficheadmin'>
                    <p>Vous n'avez aucun méssage</p>
                </div>";
            }
        }
    }



    //Template
    $template = 'admin';
    //Layout (contient header , footer)
    include('view/layout.php');
}
