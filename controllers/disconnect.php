<?php
/*Pour ce déconnecter*/
function disco()
{
    session_start();

    if (isset($_SESSION["user"])) {
        session_destroy();
        session_unset();
    }
    ?> <script>window.location.replace("accueil");</script><?php

    die;
}
