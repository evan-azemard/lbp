<!DOCTYPE html>
<html>

<head>
	<title>Accueil</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="autocompletion.css">
</head>
<body>
	<main>
		<section class="searchHome">
			<div class="img"><img src="sports.png" alt="image de sport"></div>
			<form action="index.php" method="POST" class="formHome">
				<input type="search" name="search" class="input" id="searchHome" autocomplete="off">
				<button type="submit" id="submitHome">rechercher</button>
			</form>
		</section>
	</main>
	<script type="text/javascript" src="autocompletion.js"></script>
</body>
</html>