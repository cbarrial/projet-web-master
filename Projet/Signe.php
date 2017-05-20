<?php
session_start();

//On vérifie que les informations de Pagepetition.php sont arrivées et que l'utilisateur est bien connecté
if (!empty($_POST['id'] AND $_POST['titre'] AND $_SESSION['id'])){

// Connexion à la bdd
include("connectMaBase.php");

//Initialisation des données
$id=$_POST['id'];
$titre=$_POST['titre'];
$iduser=$_SESSION['id'];

//Insertion de la nouvelle personne ayant signé dans la table signatures
$sig = $bdd->prepare('INSERT INTO signatures (id_sig, id_user, id_pet)
                      VALUES(NULL, :iduser, :id)') or die(print_r($bdd->errorInfo()));
$sig ->bindValue(':iduser', $iduser, PDO::PARAM_INT);
$sig ->bindValue(':id', $id, PDO::PARAM_INT);
$sig ->execute();

//Incrémentation du nombre de signatures dans la table petitions
$req= $bdd->prepare('UPDATE petitions SET Signatures=Signatures+1 WHERE id=:id');
$req->execute(array(
    'id' => $id));

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
<body background = "/net/t/cbarrial/Prog_Web/Projet/manif.jpg">

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
                  <li role="presentation" class="active"><a href="connexion2.php">Connexion</a></li>
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

                  <!-- On implémente le titre de la pétition qui vient d'être signé -->
                  <h1>Vous avez bien signé la pétition <?php echo $titre; ?> !</h1>


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
