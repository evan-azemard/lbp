<?php
/*Pour ce déconnecter*/

    session_start();

    if (isset($_SESSION["user"])) {
        session_destroy();
        session_unset();
    }
    ?> <script>window.location.replace("accueil.php");</script><?php

    die;

