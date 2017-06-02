<?php
session_start();

// On vérifie que l'utilisateur ait bien rentré un pseudo et mot de passe
if(!empty($_POST['pseudo'])){
  if(!empty($_POST['passe'])){

// Connexion à la base de données
include("connectMaBase.php");

// Récupération et décryptage des données écrites dans le formulaire
$pseudo=$_POST['pseudo'];
$passe=sha1($_POST['passe']);

// Vérification que l'utilisateur existe dans la bdd
$req = $bdd->prepare('SELECT id FROM validation WHERE pseudo = :pseudo AND passe = :passe');
$req->execute(array(
    'pseudo' => $pseudo,
    'passe' => $passe));

$resultat=$req->fetch();

// S'il n'existe pas
if (!$resultat)
{
header('Location: Mauvaisidmdp.php');
}
// S'il existe on ouvre une session
else
{
  session_start();
  $_SESSION['id'] = $resultat['id'];
  $_SESSION['pseudo'] = $pseudo;
  header('Location: Petitions.php');
}
}
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
                  <li role="presentation"><a href="pageacceuil.php">Accueil</a></li>
                  <li role="presentation"><a href="Petitions.php">Parcourir</a></li>
                  <li role="presentation" class="active"><a href="#">Connexion</a></li>
                  <li role="presentation"><a href="inscription2.php">Inscription</a></li>
                  <li><a href="deconnexion.php"><input type="button" class="btn btn-success btn btn-success" value="Déconnexion"></a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="container">
          <div class="row">
          <div class="col-xs-12">

            <div class="main">

              <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-1">

                  <h1>Ma Pétition</h1>
                  <h2>Parce que mon avis compte aussi</h2>

                  <form method="post">
                    <div class="form-group">
                      <div class="col-md-8"><input  placeholder="Idenfiant" class="form-control" type="text" id="UserUsername" name="pseudo"/></div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8"><input placeholder="Mot de passe" class="form-control" type="password" id="UserPassword" name="passe"/></div>
                    </div>

                    <div class="form-group">
                      <input  class="btn btn-success btn btn-success" type="submit" value="Connexion"/></div>
                      <a href="inscription2.php" class="btn btn-primary btn btn-primary">Je m'inscris</a>
                    </div>

                  </form>

                </div>
              </div>

            </div>
          </div>
  </div>
  </div>



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
