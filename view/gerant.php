<?php
if (empty($_SESSION['id'])) {
    header("Location: accueil");
}
if ($_SESSION['rank'] < 3) {
    header("Location: accueil");
}
?>
<main id="gerant_main">
    <section class="gerant_section1">
        <h1>Les admins</h1>
        <table id="gerant_tabl">
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
                    <td>3</td>
                    <td>Exemple</td>
                    <td>Exemple</td>
                </tr>
            </tbody>
        </table>
    </section>
    <div class="traimoyen_admin"></div>
    <section class="gerant_section2">
        <article>
            <form method="post" action="accueil">
                <div>
                    <label for="idgerant">Id de l'admin à supprimer</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="number" placeholder="ID :" id="idgerant">
                </div>
                <div>
                    <input type="submit" class="button_gerant" value="Valider">
                </div>
            </form>
        </article>
    </section>
</main>