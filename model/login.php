<?php


/*Ce connecter en tant que users ou sellers*/
function F_login($pseudo)
{
    $bdd =  db_connect();

    $sel = $bdd->prepare("select * from users where pseudo=? limit 1");
    $sel->execute(array($pseudo));
    $tab = $sel->fetch();
    return $tab;
}

function F_login2($pseudo)
{
    $bdd =  db_connect();

    $sel = $bdd->prepare("select * from sellers where pseudo=? limit 1");
    $sel->execute(array($pseudo));
    $tab = $sel->fetch();
    return $tab;
}
