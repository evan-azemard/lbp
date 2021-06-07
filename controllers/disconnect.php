<?php
/*Pour ce déconnecter*/
function disco()
{
    session_start();

    if (isset($_SESSION["user"])) {
        session_destroy();
        session_unset();
    }
    header("Location: accueil");
    die;
}
