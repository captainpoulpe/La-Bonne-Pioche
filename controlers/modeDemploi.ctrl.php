<?php
require_once("../framework/view.class.php");

// On créer une variable view que l'on rattache au fichier accueil.view.php
$view = new View('../view/modeDemploi.view.php');
// On l'affiche (cette méthode est défini dans le fichier ../framework/view.class.php).
$view->show();

?>
