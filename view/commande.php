<?php
if (empty($_SESSION['id'])){
    header("Location: login");
}
//Affichage des erreurs PHP ( A mettre au début de tes scripts PHP )
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

// Démarrage des sessions si pas déjà démarrées
if (session_status() == PHP_SESSION_NONE) {

}

//on inclus la class qui permet de gérer le panier
// require_once "chemin/vers/le/fichier/cart.class.php";
/*require_once "cart.class.php";*/

//on initialise l'objet panier :
$oPanier = new cart();


//maintenant on peut ajouter des produits au panier
echo "<br><hr><br> On ajoute deux produits au panier";
$oPanier->addProduct(1, 'produit 1', 1, 10);
$oPanier->addProduct(654, 'produit xx', 1, 99.5);


//on affiche le nombre de produits dans le pannier
$nbProducts = $oPanier->getNbProductsInCart();
echo "<br>Nombre de produits : " . $nbProducts;

//on affiche le contenu du panier 
$contenu_panier = $oPanier->getList();
echo "<pre> Contenu du panier :<br>";
print_r($contenu_panier);
echo "</pre>";

//on affiche le montant total du panier
$total = $oPanier->getTotalPriceCart();
echo "<br>Total panier : " . $total;


// on modifie la quantité du premier produit
echo "<br><hr><br> On modifie la quantité du premier produit : nouvelle quantité = 35 ";
$oPanier->updateQteProduct(1, 35);

//on re-affiche le nombre de produits dans le pannier
$nbProducts = $oPanier->getNbProductsInCart();
echo "<br>Nombre de produits : " . $nbProducts;

//on re-affiche le contenu du panier 
$contenu_panier = $oPanier->getList();
echo "<pre> Contenu du panier :<br>";
print_r($contenu_panier);
echo "</pre>";

//on re-affiche le montant total du panier
$total = $oPanier->getTotalPriceCart();
echo "<br>Total panier : " . $total;


// On retire le produit dont l'id est : 654
echo "<br><hr><br>On retire le produit dont l'id est : 654";
$oPanier->removeProduct(654);
//on re-affiche le contenu du panier 
$contenu_panier = $oPanier->getList();
echo "<pre> Contenu du panier :<br>";
print_r($contenu_panier);
echo "</pre>";
