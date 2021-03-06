<?php
// Display un produit connu par son Id
// Inclusion du modèle
require_once('../model/Produit.class.php');
require_once('../model/ProduitDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

// récupération des valeurs de la query string
if (isset($_GET['refProduit'])) {
  $refProduit = intVal($_GET['refProduit']);
} else {
  exit("Erreur : refProduit non définie");
}

// Creation de l'instance DAO
$catalogue = new ProduitDAO();

// Récupération de l'objet produit correspondant à l'id
$produit = $catalogue->get($refProduit);

///////// AJOUTE POUR MVC
$view = new View("produit.view.php");

// Passage des paramètres à la vue
$view->produit=$produit;

// Appel de la vue
$view->show();
?>
