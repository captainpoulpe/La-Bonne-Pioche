CREATE TABLE utilisateurs (
  refUtilisateur INTEGER PRIMARY KEY,
  nom STRING,
  prenom STRING,
  adresseMail STRING,
  motDePasse STRING,
  etat STRING,
  numeroTelephone STRING,
  statut BOOLEAN,
  newsletter BOOLEAN,
  genre BOOLEAN,
  tauxReduction FLOAT,
  refEntreprise INTEGER
 );