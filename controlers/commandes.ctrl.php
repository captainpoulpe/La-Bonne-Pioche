<?php
session_start();
// Display tous les produits
// Inclusion du modèle
require_once('../model/Commande.class.php');
require_once('../model/CommandeDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

if(isset($_SESSION['Utilisateur']))
{
  $statut=-1;
  foreach ($_SESSION['Utilisateur'] as $key => $value) {
    $$key = $value;
  }
  if($statut>=0)
  {
    $commandes = new commandeDAO();

    if (isset($_GET['refReception'])) {
      $refReception = intVal($_GET['refReception']);
      $commandes->validerCommande($refReception);
    }

    if (isset($_GET['refSuppr'])) {
      $refSuppr = intVal($_GET['refSuppr']);
      $commandes->deleteCommande($refSuppr);
    }

    // Creation de l'instance DAO


    // Récupération des données à placer dans la vue à partir du modèle
    $list = $commandes->getAll();
    $commandes->updateCommande($list);

    // Traitement de l'affichage des dates
    foreach ($list as $commande) {
      $tmpDC = $commande->dateCommande;
      $tmpDP = $commande->dateRecup;

      $DC_DH = explode(' ' , $tmpDC);
      $DC = explode('-',$DC_DH[0]);
      $commande->dateCommande = $DC[2]."/".$DC[1]."/".$DC[0]." ".$DC_DH[1];

      $DP_DH = explode(' ' , $tmpDP);
      $DP = explode('-',$DP_DH[0]);
      $commande->dateRecup = $DP[2]."/".$DP[1]."/".$DP[0]." ".$DP_DH[1];
    }

    // On créer une variable view que l'on rattache au fichier accueil.view.php
    $view = new View("../view/commandes.view.php");

    // Envoie la liste des produits à la vue
    $view->list=$list;

    // Appel de la vue
    $view->show();
}
else {
  exit("Le statut renvoie une erreur");
}
}

else {
exit("Il faut être employé pour avoir accès à ce module");
}
?>
