<?php

  require_once("Client.class.php");

  class ClientEntreprise extends Client {

    private $refEntreprise;

    //constructeur
    public function __construct(int $refUtilisateur, string $nom, string $prenom, string $adresseMail, string $motDePasse, string $etat, string $numeroTelephone, bool $newsletter, int $genre, float $tauxReduction, int $refEntreprise){

      //construction de l'objet mère Utilisateur
      parent::__construct($refUtilisateur, $nom, $prenom, $adresseMail, $motDePasse, $etat, $numeroTelephone, $newsletter, $genre, $tauxReduction);

      $this->refEntreprise = $refEntreprise;
    }


    public function __get(string $attribut) {

      $retour = -1;

      if ( $attribut == "refUtilisateur" || $attribut == "nom" || $attribut == "prenom" || $attribut == "adresseMail" || $attribut == "motDePasse" || $attribut == "etat" || $attribut == "numeroTelephone" || $attribut == "newsletter" || $attribut == "genre" || $attribut == "tauxReduction") {

        $retour = parent::__get($attribut);
      }
      elseif ( $attribut == "refEntreprise" ) {

        $retour = $this->$attribut;
      }
      else {

        throw new Exception("Error cannot acces '$attribut'", 3);
      }

      return $retour;

    }


    public function __set(string $attribut, $valeur) {

      if ( $attribut == "refUtilisateur" || $attribut == "nom" || $attribut == "prenom" || $attribut == "adresseMail" || $attribut == "motDePasse" || $attribut == "etat" || $attribut == "numeroTelephone" || $attribut == "newsletter" || $attribut == "genre" || $attribut == "tauxReduction") {

        parent::__set($attribut, $valeur);
      }
      elseif ( $attribut == "refEntreprise" ) {

        $this->$attribut = $valeur;
      }
      else {

        throw new Exception("Error cannot acces '$attribut'", 3);
      }
    }


    public function affiche() : void {

      parent::affiche();

      echo "refEntreprise : ".$this->refEntreprise."\n";
    }

  }

?>
