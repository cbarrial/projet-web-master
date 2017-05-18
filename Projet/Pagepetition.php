<?php
session_start();
include("functions.php");

if (empty($_SESSION['id'] OR $_SESSION['pseudo']))
{                                                         //Cette ligne fait buguer la page donc corrige fdp
  header('Location: /Projet/connexion.php');
}


try
{
  $bdd = new PDO('mysql:host=localhost;dbname=petition;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['id'])){
$titre=$_POST['titre'];
$texte=$_POST['texte'];
$id=$_POST['id'];

$req=$bdd->prepare('SELECT Signatures FROM petitions WHERE id=:id');
$req->bindValue(':id', $id, PDO::PARAM_INT);
$req->execute();

$resultat=$req->fetch();

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
    <!--<link href="cover.css" rel="stylesheet">-->


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
                  <li><a href="deconnexion.php"><input type="button" class="btn btn-success btn btn-success" value="Déconnexion"></a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="container">

    <div class="col-sm-8 blog-main">



  <div class="blog-header">
    <?php echo '<h1 class="blog-title">' . htmlspecialchars($titre) . '</h1>'; ?>
    <?php echo '<p class="lead blog-description">' . htmlspecialchars($texte) . '</p>'; ?>
  </div>


  <div class="row">

      <form method="post" action="Signe.php">
        <p>Cette pétition compte déjà <?php echo $resultat['Signatures']; ?> signatures, toi aussi viens apporter ta contribution !</p>
        <input type="hidden" name="id" value="<?php echo $id ?>" />
        <input type="hidden" name="titre" value="<?php echo $titre ?>" />
        <button type="submit" class="btn btn-lg btn-success">Je signe !</button>
      </form>

    </div><!-- /.blog-main -->

<?php
}
else {
  header('Location: Signe.html');
}
 ?>



  </div><!-- /.row -->

</div><!-- /.container -->

</div>
</div>
</div>
</body>
</html>
