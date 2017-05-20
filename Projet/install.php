<?php
//base de données
$qDb = "CREATE DATABASE IF NOT EXISTS `petition`;";

$qSelDb = "USE `petition`;";

//Table validation
$qTbUser = "CREATE TABLE IF NOT EXISTS `validation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `passe` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)";

//Table petitions
$qTbPeti = "CREATE TABLE IF NOT EXISTS `petitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(255) NOT NULL,
  `Texte` text NOT NULL,
  `Createur` varchar(255) NOT NULL,
  `Categorie` varchar(255) NOT NULL,
  `Signatures` int(11) NOT NULL,
  PRIMARY KEY(`id`)
)";

//Table Signatures
$qTbSig = "CREATE TABLE IF NOT EXISTS `signatures` (
  `id_sig` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL,
  PRIMARY KEY(`id_sig`)
)";

echo "Connexion au serveur MySQL.";

//connection à la base
include ("connectMaBase.php");

//Création des tables
$req=$bdd->exec($qTbUser);
if ($req === false)
    echo 'ERREUR : ', print_r($bdd->errorInfo());
else
    echo "Création de la table Validation.";


$req2=$bdd->exec($qTbPeti);
if ($req2 === false)
    echo 'ERREUR : ', print_r($bdd->errorInfo());
else
    echo "Création de la table petitions.";


$req3=$bdd->exec($qTbSig);
if ($req === false)
    echo 'ERREUR : ', print_r($bdd->errorInfo());
else
    echo "Création de la table signatures.";

?>
