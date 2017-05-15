<?php
session_start();
if(!empty($_POST['titre']))
{
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=petition;charset=utf8', 'root', '');
  }
  catch (Exception $e)
  {
          die('Erreur : ' . $e->getMessage());
  }

  $titre=$_POST['titre'];
  $petition=$_POST['text'];
  $pseudo=$_SESSION['pseudo'];
  $categorie=$_POST['categorie'];


  $req = $bdd->prepare('INSERT INTO petitions (id, Titre, Texte, Createur, Categorie) VALUES(NULL, :titre, :petition, :createur, :categorie)') or die(print_r($bdd->errorInfo()));
  $req->bindValue(':titre', $titre, PDO::PARAM_STR);
  $req->bindValue(':petition', $petition, PDO::PARAM_STR);
  $req->bindValue(':createur', $pseudo, PDO::PARAM_STR);
  $req->bindValue(':categorie', $categorie, PDO::PARAM_STR);
  $req->execute();


  header('Location: /Projet/Petitions.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="stylesheet.css"><!DOCTYPE html>
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
  <link href="cover2.css" rel="stylesheet">
  <link href="cover.css" rel="stylesheet">


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
                <li role="presentation" class="active"><a href="pageacceuil.php">Accueil</a></li>
                <li role="presentation"><a href="Petitions.php">Parcourir</a></li>
                <li role="presentation"><a href="connexion2.php">Connexion</a></li>
                <li><a href="inscription2.php">Inscription</a></li>
              </ul>
            </nav>
          </div>
        </div>

        <form method='post'>
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
              <option value="nouvelle">Nouvelle Catégorie</option>
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
