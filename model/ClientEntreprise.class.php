<?php

  require_once("Client.class.php");

  class ClientEntreprise extends Client {

    //constructeur
    public function __construct(int $refUtilisateur, string $nom, string $prenom, string $adresseMail, string $motDePasse, string $etat, string $numeroTelephone, bool $newsletter, bool $genre, float $tauxReduction){

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel : ".__METHOD__."\n";}

      //construction de l'objet mère Utilisateur
      parent::__construct($refUtilisateur, $nom, $prenom, $adresseMail, $motDePasse, $etat, $numeroTelephone, $newsletter, $genre, $tauxReduction);
    }


    public function __get(string $attribut) {

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel : ".__METHOD__."\n";}

      if ( $attribut != "refUtilisateur" && $attribut != "nom" && $attribut != "prenom" && $attribut != "adresseMail" && $attribut != "motDePasse" && $attribut != "etat" && $attribut != "newsletter" && $attribut != "genre" && $attribut != "numeroTelephone" && $attribut != "tauxReduction" ) {

        throw new Exception("Error cannot acces '$attribut'", 3);
      }

      return parent::__get($attribut);
    }


    public function __set(string $attribut, $valeur) {

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel : ".__METHOD__."\n";}

      if ( $attribut != "refUtilisateur" && $attribut != "nom" && $attribut != "prenom" && $attribut != "adresseMail" && $attribut != "motDePasse" && $attribut != "etat" && $attribut != "newsletter" && $attribut != "genre" && $attribut != "numeroTelephone" && $attribut != "tauxReduction" ) {

        throw new Exception("Error cannot acces '$attribut'", 3);
      }

      parent::__set($attribut, $valeur);
    }


    public function affiche() : void {

      //test d'appel de la méthode
      if(TEST == 1){ echo "appel :".__METHOD__."\n";}

      parent::affiche();
    }

  }

?>