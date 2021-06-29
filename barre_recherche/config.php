<?php 

// session_start();

require 'database.php';
$db = new Database();

require 'search.php';
$search = new Search($db);



?>