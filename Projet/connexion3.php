<?php
if(!empty($_POST['pseudo']))
{

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=petition;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


$pseudo=$_POST['pseudo'];
$passe=sha1($_POST['passe']);

// Vérification des identifiants
$req = $bdd->prepare('SELECT id FROM validation WHERE pseudo = :pseudo AND passe = :passe');
//$req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
//$req->bindValue(':pseudo', $passe, PDO::PARAM_STR);
//$req->execute();
$req->execute(array(
    'pseudo' => $pseudo,
    'passe' => $passe));

$resultat=$req->fetch();

if (!$resultat)
{
echo 'Mauvais identifiant ou mot de passe !';
}
else
{
  session_start();
  $_SESSION['id'] = $resultat['id'];
  $_SESSION['pseudo'] = $pseudo;
  header('Location: /Projet/connecté.html');
}
}
?>

<!DOCTYPE html>
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
                      <div class="col-md-offset-0 col-md-8"><input  class="btn btn-success btn btn-success" type="submit" value="Connexion"/></div>
                    </div>

                  </form>


                  <p class="credits">Développé par <a href="http://www.monsite.com" target="_blank">une super agence</a>.</p>
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
