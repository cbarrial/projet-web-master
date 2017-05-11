<!DOCTYPE html>

<?php
// Vérification de la validité des informations

// Hachage du mot de passe
$pass_hache = sha1($_POST['pass']);

// Insertion
$req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_hache,
    'email' => $email));
?>

<html lang="fr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="cover.css"><!DOCTYPE html>
  <title> Skyblog </title>
</head>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Cover Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/cover/cover.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body background = "/net/t/cbarrial/Prog_Web/Projet/inscrip.jpg">

    <div class="site-wrapper">
    <div class = "frost"> </div>
      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Pétitions</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li role="presentation"><a href="pageacceuil.html">Accueil</a></li>
                  <li role="presentation"><a href="decpet.html">Parcourir</a></li>
                  <li role="presentation"><a href="connexion2.html">Connexion</a></li>
                  <li role="presentation" class="active"><a href="inscription.html">Inscription</a></li>
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

    <div class="row">
    <div class="col-md-offset-1 col-md-3">
    <div class="form-group">
      <label for="Nom">Nom</label>
      <input type="text" class="form-control" id="nom" placeholder="Nom">
    </div>
    </div>
    <div class="col-md-offset-1 col-md-3">
      <div class="form-group">
        <label for="Prenom">Prénom</label>
    <input type="text" class="form-control" id="prenom" placeholder="Prénom">
    </div>
    </div>
    </div>

    <div class="row">
      <div class="col-md-offset-1 col-md-7">
        <div class="form-group">
          <label for="Email">Email address</label>
          <input type="text" class="form-control" id="email" placeholder="Enter email">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-offset-1 col-md-3">
        <div class="form-group">
          <label for="Password">Mot de passe</label>
          <input type="password" class="form-control" id="password" placeholder="Mot de passe">
        </div>
      </div>
      <div class="col-md-offset-1 col-md-3">
        <div class="form-group">
          <label for="Vpassword">Vérification mot de passe</label>
          <input type="password" class="form-control" id="vpassword" placeholder="Vérification mot de passe">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-offset-1 col-md-3">
        <div class="input-group">
          <span class="input-group-addon glyphicon glyphicon-earphone"></span>
          <input type="text" class="form-control" placeholder="Téléphone" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
          <span class="input-group-addon glyphicon glyphicon-globe"></span>
          <input type="text" class="form-control" placeholder="Adresse" aria-describedby="basic-addon1">
        </div>
      </div>
    </div>

    <br/>
    <div class="row">
      <div class="col-md-offset-5 col-md-1">
        <button type="button" class="btn btn-primary">Envoyer mes informations</button>
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
