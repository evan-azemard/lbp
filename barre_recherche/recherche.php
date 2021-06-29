 <?php
 require "config.php";
 $recherche = isset($_GET['search']) ? $_GET['search'] : '';
 if(isset($_GET['search'])){$data = $search->getSearch($recherche);}
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Recherche</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="fontawesome/all.css">
	<link rel="stylesheet" type="text/css" href="autocompletion.css">
</head>
<body>
<header>
    <div id="header_div">
        <h1>Autocomplétion</h1>
        <form id="header_form" method="POST">
            <div id="flfl">
                <input type="search" name="search"  aria-label="recherche" id="searchNav" autocomplete="off">
                <div id="fl2">
                    <div class="autocompletion" id="autocompletion"></div>
                </div>
            </div>
            <input type="submit" id="submitNav" value="Rechercher">
        </form>
	</div>
</header>
<main id="mainmain">
    <?php if(isset($data)){ ?>
        <div id="re_div">
            <span id="searchDisplay" class="searchDisplay">
                <?php echo $data; ?>
            </span>
        </div>
    <?php } ?>
</main>
<footer>
    <p>Copyright 2021 © Evan Azemard, Clément Nahmens Autocomplétion | Tous droits réservés</p>
</footer>
</body>
</html>
	<script type="text/javascript" src="autocompletion.js"></script>
