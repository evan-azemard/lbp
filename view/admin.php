<?php
if (empty($_SESSION['id'])) {
    header("Location: accueil");
}
if ($_SESSION['rank'] < 3) {
    header("Location: accueil");
}
$user = new C_admin();
?>
<main id="admin_main">
    <?=  $user->affiche(); ?>
</main>