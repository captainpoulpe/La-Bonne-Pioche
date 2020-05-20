<?php
  require_once(dirname(__FILE__).'/Entreprise.class.php');
    require_once(dirname(__FILE__).'/ClientEntreprise.class.php');

  class EntrepriseDAO {
    private $db;

    function __construct()
    {
      $database = 'sqlite:'.dirname(__FILE__).'/..data/database.db';

      try {
        $this->db = new PDO($database);
        if(!$this->db){
          die ("Database error");
        }
      }
      catch (PDOException $e)
      {
        die("PDO Error :".$e->getmessage()." $database\n");
      }
      $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    function get(int $ref_Entreprise) : Entreprise {
      $req = "SELECT * FROM entreprises WHERE ref_entreprise = '$ref_Entreprise'";
      $sth = $this->db->query($req);
      $resArray= $sth->fetchAll(PDO::FETCH_ASSOC);
      $entreprise = new Produit($resArray['ref_entreprise'],$resArray['nom'],$resArray['numero_siret']);
      return $entreprise;
    }


    function getPersonnels(int $ref_Entreprise) : array {
      $produit = new ClientEntreprise();
      $r = $this->db->query("SELECT * FROM clientsEntreprise_entreprises WHERE ref_entreprise = $ref_Entreprise");
      $res = $r->fetchAll(PDO::FETCH_ASSOC);
      $personnels = array();

      foreach($res as $row)
      {
        $prod = $utilisateur->get($row['ref_utilisateur']);
        $personnels[]=$prod;
      }
      return $personnels;
    }

  }

 ?>