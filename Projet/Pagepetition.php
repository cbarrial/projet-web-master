<?php
session_start();

// Si l'utilisateur n'est pas connecté
if (empty($_SESSION['id'] OR $_SESSION['pseudo']))
{
  header('Location: /Projet/connexion.php');
}

// Connexion à la base de données
include("connectMaBase.php");

//Si l'utilisateur clique sur le bouton je signe
if (isset($_POST['id'])){

//Initialisation des données
$titre=$_POST['titre'];
$texte=$_POST['texte'];
$id=$_POST['id'];
$iduser=$_SESSION['id'];

//On cherche si l'utilisateur à déjà signé la pétition
$req1=$bdd->prepare('SELECT id_sig FROM signatures WHERE id_user=:iduser AND id_pet=:id');
$req1->bindValue(':iduser', $iduser, PDO::PARAM_INT);
$req1->bindValue(':id', $id, PDO::PARAM_INT);
$req1->execute();

$test=$req1->fetch();

//S'il ne l'a pas signé
if (empty($test['id_sig'])){

//On récupère le nombre de signatures qu'il y a déjà pour cette pétition
$req=$bdd->prepare('SELECT Signatures FROM petitions WHERE id=:id');
$req->bindValue(':id', $id, PDO::PARAM_INT);
$req->execute();

$resultat=$req->fetch();

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

          <div class="container">

    <div class="col-sm-8 blog-main">



  <div class="blog-header">
    <!-- On affiche le titre et le texte entier de la pétition dont l'utilisateur à cliqué sur consulter -->
    <?php echo '<h1 class="blog-title">' . htmlspecialchars($titre) . '</h1>'; ?>
    <?php echo '<p class="lead blog-description">' . htmlspecialchars($texte) . '</p>'; ?>
  </div>


  <div class="row">

      <form method="post" action="Signe.php">
        <!-- On affiche ici le nombre de signatures qui existent déjà pour la pétition -->
        <p>Cette pétition compte déjà <?php echo $resultat['Signatures']; ?> signatures, toi aussi viens apporter ta contribution !</p>
        <!-- On implémente un formulaire que l'utilisateur ne voit pas pour renvoyer l'id et le titre de la pétition vers Signe.php -->
        <input type="hidden" name="id" value="<?php echo $id ?>" />
        <input type="hidden" name="titre" value="<?php echo $titre ?>" />
        <button type="submit" class="btn btn-lg btn-success">Je signe !</button>
      </form>

    </div><!-- /.blog-main -->

<?php
}
//Si l'utilisateur à déjà signé la pétition
else {
  header('Location: DejaSigne.html');
}
}
 ?>



  </div><!-- /.row -->

</div><!-- /.container -->

</div>
</div>
</div>
</body>
</html>
