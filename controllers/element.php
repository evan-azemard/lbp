<!-- affiche l'article une fois selectionné dans la barre de recherche -->

<?php require "config.php";
if (isset($_GET['id'])) {
    $data = $search->getRequestInfo($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href=".css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <header>
        <div id="header_div">
            <h1>Résultat de la recherche</h1>
            <form id="header_form" method="POST">
                <div id="flfl">
                    <input type="search" name="search" aria-label="recherche" id="searchNav" autocomplete="off">
                    <div id="fl2">
                        <div class="autocompletion" id="autocompletion"></div>
                    </div>
                </div>
                <input type="submit" id="submitNav" value="Rechercher">
            </form>
        </div>
    </header>
    <main id="mainmain">
        <div id="searchDisplay">
            <?php
            if (isset($data)) { ?>
                <table border="1px">
                    <thead>
                        <tr>
                            <th>Marque</th>
                            <th>Model</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $data['id'] ?></td>
                            <td><?php echo $data['nom_model'] ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </main>