<?php
require('model/admin.php');

function admin()
{
    class C_admin
    {
        public  function logoA()
        {
            $rec = cherche_logo_Ad($_SESSION['id']);
            if ($rec === false){
                var_dump("null");
            }
            if ($rec === true)
            {
                var_dump("true");

                ?>
                <style>
                    #header_panier{
                        color: rgba(255, 0, 55, 0.58) !important;
                    }
                </style>
                <?php
            }
        }

        public function affiche()
        {
            $admin = seladm();
            if (!empty($admin))
            {
                foreach ($admin as $key)
                {

                    if (isset($_POST['envoyer2']))
                    {

                        if (!empty($_POST['reponse']))
                        {

                            $message = 'Message de la part d\'un admin  Smart Your Future
                          Votre message : ' . $key['message'] . '
                          
                          Reponse : ' . $_POST['reponse']. '';

                            /*La fonction ne peut pas marcher en local*/
                            $retour = mail($key['email'],'Réponsse Admin SYF', $message);
                            if($retour) {
                                ?><script> alert("Votre message a bien été envoyé.") </script>
                                <?php
                                deletempadmin($_POST['idmp']);
                            }else{
                                ?><script> alert("Vous ne pouvez pas envoyer de mail avec le port localhost.") </script>
                                <?php
                            }
                        }
                    }
                    if (isset($_POST['deletadmin'])){
                        deletempadmin($_POST['idmp']);
                        ?><meta http-equiv="refresh" content="0"><?php
                    }

                    ?>

                    <div class="admin_div">
                        <div class="admin_cont1">
                            <div class="admin_cont1_text">
                                <div class="admin_label">
                                    <p>Email : <span class="admin_gray"><?= Htmlspecialchars($key['email']) ?></span> </p>
                                </div>
                                <div class="admin_label">
                                    <p>Id produit : <span class="admin_gray"> <?= Htmlspecialchars($key['id_produit']) ?></span> </p>
                                </div>
                            </div>
                            <div class="admin_cont1_textarea">
                                <div class="admin_cont_texta">
                                    <p style="display: flex">
                                        <?= Htmlspecialchars($key['message']) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="traimoyen_admin"></div>
                        <div class="admin_cont2">
                            <form class="admin_form" method="post">
                                <input aria-label="idmp" type="text" name="idmp" value="<?= Htmlspecialchars($key['id_produit']) ?>"style="display: none">
                                <textarea aria-label="textarea" name="reponse" class="admin_textarea" placeholder="Méssage de réponse[...]"></textarea>
                                <div class="admin_button">
                                    <input type="submit" class="button" name="deletadmin" value="Supprimer">
                                    <input type="submit" class="button" name="envoyer2" value="Envoyer">
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
