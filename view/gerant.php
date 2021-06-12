<?php
if (empty($_SESSION['id'])) {
    header("Location: accueil");
}
if ($_SESSION['rank'] < 4) {
    header("Location: accueil");
}


$user = new C_gerant();
$sel = $user->selectadmin();

if (isset($_POST['delette']))
{
    $errors = $user->deladmin($_POST['idadmin']);
} else
{
    $errors = array();
}
?>

<main id="gerant_main">
    <section class="gerant_section1" style="overflow:auto;height:  10vh!important">
        <?php include 'error.php'; ?>
        <h1>Les admins</h1>
        <?php foreach ($sel as $key){ ?>
            <table id="gerant_tabl" >
                <thead>
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Nom
                    </th>
                    <th>
                        Prénom
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= $key['id_user']; ?></td>
                    <td><?= $key['nom']; ?></td>
                    <td><?= $key['prenom']; ?></td>
                </tr>
                </tbody>
            </table>
            <?php
        }
        ?>
    </section>
    <section class="gerant_section2">
        <article>

            <form method="post">
                <div>
                    <label for="idgerant">Id de l'admin à supprimer</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="number" name="idadmin" placeholder="ID :" id="idgerant">
                </div>
                <div>
                    <input type="submit" name="delette" class="button_gerant" value="Valider">
                </div>
            </form>
        </article>
    </section>
</main>