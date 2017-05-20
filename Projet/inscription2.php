<?php

//On vérifie que l'utilisateur ait bien remplit le formulaire
if(!empty($_POST['pseudo'])){
if(!empty($_POST['passe'])){
if(!empty($_POST['passe2'])){

  // D'abord, je me connecte à la base de données.
include ("connectMaBase.php");

  $passe = $_POST['passe'];
  $passe2 = $_POST['passe2'];

  //On vérifie que les deux mots de passe soient les mêmes
  if($passe == $passe2)
  {
    $nom = $_POST['nom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];

    // Je vais crypter le mot de passe.
    $passe = sha1($passe);
    // Insertion du nouvel utilisateur à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO validation (id, nom, pseudo, passe, email) VALUES(NULL, :nom, :pseudo, :passe, :email)');
    $req->bindValue(':nom', $nom, PDO::PARAM_INT);
    $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->bindValue(':passe', $passe, PDO::PARAM_STR);
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->execute();

  header('Location: /Projet/pageacceuilins.php');
  }
  else
  {
    echo '<div class="alert alert-danger"> <strong>Attention !</strong>Les deux mots de passes sont différents.</div>';
  }
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
                  <li role="presentation"><a href="connexion2.php">Connexion</a></li>
                  <li role="presentation" class="active"><a href="inscription2.php">Inscription</a></li>
                  <li><a href="deconnexion.php"><input type="button" class="btn btn-success btn btn-success" value="Déconnexion"></a></li>
                </ul>
              </nav>
            </div>
          </div>


          <div class="container">

            <div class="row">
              <div class="col-md-offset-1 col-md-8">
                <h1> Inscription <br/> <small> Merci de renseigner vos informations </small></h1>
              </div>
            </div>

    <form method="post">
    <div class="row">
    <div class="col-md-offset-1 col-md-3">
    <div class="form-group">
      <label for="Nom">Nom</label>
      <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
    </div>
    </div>
    <div class="col-md-offset-1 col-md-3">
      <div class="form-group">
        <label for="Prenom">Pseudo</label>
    <input type="text" class="form-control" id="prenom" placeholder="Pseudo" name="pseudo">
    </div>
    </div>
    </div>

    <div class="row">
      <div class="col-md-offset-1 col-md-7">
        <div class="form-group">
          <label for="Email">Email address</label>
          <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-offset-1 col-md-3">
        <div class="form-group">
          <label for="Password">Mot de passe</label>
          <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="passe">
        </div>
      </div>
      <div class="col-md-offset-1 col-md-3">
        <div class="form-group">
          <label for="Vpassword">Vérification mot de passe</label>
          <input type="password" class="form-control" id="vpassword" placeholder="Vérification mot de passe" name="passe2">
        </div>
      </div>
    </div>


    <br/>
    <div class="row">
      <div class="col-md-offset-5 col-md-1">
        <button type="submit" class="btn btn-primary">Envoyer mes informations</button>
      </div>
    </div>

    </div>
  </form>


          <div class="mastfoot">
            <div class="inner">
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


</body>
</html>
