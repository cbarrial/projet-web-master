<?php
//On ouvre la session
session_start();

//On vérifie que le formulaire soit bien remplie et l'utilisateur connecté
if(!empty($_POST['titre'])){

  //Connexion à la bdd
  include("connectMaBase.php");

  // Initialisation des variables
  $titre=$_POST['titre'];
  $petition=$_POST['text'];
  $pseudo=$_SESSION['pseudo'];
  $categorie=$_POST['categorie'];
  $sig=0;

// Ajout de la pétition à la bdd
$req = $bdd->prepare('INSERT INTO petitions (id, Titre, Texte, Createur, Categorie, Signatures)
                      VALUES(NULL, :titre, :petition, :createur, :categorie, :signatures)') or die(print_r($bdd->errorInfo()));
$req->bindValue(':titre', $titre, PDO::PARAM_STR);
$req->bindValue(':petition', $petition, PDO::PARAM_STR);
$req->bindValue(':createur', $pseudo, PDO::PARAM_STR);
$req->bindValue(':categorie', $categorie, PDO::PARAM_STR);
$req->bindValue(':signatures', $sig, PDO::PARAM_INT);
$req->execute();

  //Redirection vers la page de pétitions
  header('Location: Petitions.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Importation des fichiers css -->
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="cover.css"><!DOCTYPE html>
  <title> Pétitions </title>
</head>
<head>
    <!-- Importation des templates de Bootstrap -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="../../favicon.ico">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="http://getbootstrap.com/examples/cover/cover.css" rel="stylesheet">
    <link href="cover2.css" rel="stylesheet">
    <link href="cover.css" rel="stylesheet">

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>
<body>

  <div class="site-wrapper">
    <div class="site-wrapper-inner">

      <div class="cover-container">

        <div class="masthead clearfix">
          <div class="inner">
            <h3 class="masthead-brand">Pétitions</h3>
            <nav>
              <ul class="nav masthead-nav">
                <li role="presentation" class="active"><a href="pageacceuil.php">Accueil</a></li>
                <li role="presentation"><a href="Petitions.php">Parcourir</a></li>
                <li role="presentation"><a href="connexion2.php">Connexion</a></li>
                <li><a href="inscription2.php">Inscription</a></li>
                <li><a href="deconnexion.php"><input type="button" class="btn btn-success btn btn-success" value="Déconnexion"></a></li>
              </ul>
            </nav>
          </div>
        </div>

        <form enctype="multipart/form-data" method='post'>
          <div class="form-group">
            <label for="exampleInputPassword1">Titre de votre Pétition</label>
            <input type="Titre de la pétition..." class="form-control" id="exampleInputPassword1" placeholder="Titre de la pétition..." name="titre">
          </div>
          <div class="form-group">
            <label for="exampleSelect1">Catégorie de Pétition</label>
            <select name="categorie" class="form-control" id="exampleSelect1">
              <option value="politique">Pétition Politique</option>
              <option value="feministe">Pétition Féministe</option>
              <option value="justice">Pétition Justice</option>
              <option value="education">Pétition Education</option>
              <option value="environment">Pétition Environment</option>
              <option value="sport">Pétition Sport</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleTextarea">Votre Pétition</label>
            <textarea name="text" class="form-control" id="exampleTextarea" rows="3">Ecrivez votre Pétition...</textarea>
          </div>

          <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>


        <div class="mastfoot">
          <div class="inner">
          </div>
        </div>

      </div>

    </div>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="../../dist/js/bootstrap.min.js"></script>
  <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


</body>
</html>
