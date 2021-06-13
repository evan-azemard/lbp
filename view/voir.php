<?php
if (empty($_SESSION['id'])) {
    header("Location: accueil");
}
if ($_SESSION['rank'] == 3) {
    header("Location: accueil");
}
if ($_SESSION['rank'] == 1) {
    header("Location: accueil");
}

$user = new C_voir();
$user->logoA();

?>

<main id="admin_main">
<?= $affiche = $user->repondre($_SESSION['id']); ?>
</main>