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
                <li role="presentation" class="active"><a href="Petitions.php">Parcourir</a></li>
                <li role="presentation"><a href="connexion2.php">Connexion</a></li>
                <li><a href="inscription2.php">Inscription</a></li>
                <li><a href="deconnexion.php"><input type="button" class="btn btn-success btn btn-success" value="Déconnexion"></a></li>
              </ul>
            </nav>
          </div>
        </div>
          <div style='position: absolute; top: 150px; left: 320px'>
            <ul class="nav nav-tabs" style="color: #808080">
          <li role="presentation" class="active"  style="color: #8080"><a href="Petitions.php">Pétitions</a></li>
          <li role="presentation" style="color: #8080"><a href="PetitionsPolitiques.php">Pétitions Politiques</a></li>
          <li role="presentation" style="color: #8080"><a href="PetitionsEducation.php">Pétitions Education</a></li>
          <li role="presentation" style="color: #8080"><a href='PetitionsFeministes.php'>Pétitions Feministes</a></li>
          <li role="presentation" style="color: #8080"><a href='PetitionsSports.php'>Pétitions Sports</a></li>
          <li role="presentation" style="color: #8080" class="active"><a href='#'>Pétitions Justice</a></li>
          <li role="presentation" style="color: #8080"><a href='PetitionsEnvironment.php'>Pétitions Environment</a></li>
        </ul>
      </div>


      <div class="row" style="margin-top: 200px; ">
        <?php
        //Connexion à la bdd
        include("connectMaBase.php");

        //On récupère les 3 dernières pétion entrés dans la table catégorie justice
      $pet=$bdd->query('SELECT Titre, Texte, id FROM petitions WHERE categorie=\'justice\' ORDER BY ID DESC LIMIT 0, 3');

      //On répète cette opération 3 fois
      while ($donnees = $pet->fetch())
      {
        ?>

        <form action="Pagepetition.php" method="post">
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img src="avocat.jpeg" alt="erreur">
            <div class="caption">
              <!-- On récupère les données de la pétition pour laquelle on appuit sur consulter et on les renvois à Pagepetition.php -->
              <input type="hidden" name="id" value="<?php echo $donnees['id'] ?>" />
              <input type="hidden" name="titre" value="<?php echo $donnees['Titre'] ?>" />
              <input type="hidden" name="texte" value="<?php echo $donnees['Texte'] ?>" />
              <!-- On affiche le titre et le texte de la pétition récupérée dans la bdd -->
              <?php echo '<h3>' . htmlspecialchars($donnees['Titre']) . '</h3>'; ?>
              <?php echo '<p>' . htmlspecialchars(substr($donnees['Texte'],0,100)) . '</p>'; ?>
              <button type="submit" class="btn btn-primary">Consulter</button>
            </div>
          </div>
        </div>
        </form>


        <?php
        }
        //On ferme notre boucle
        $pet->closeCursor();
        ?>

      </div>

    </nav>
  </div>
</div>
      </div>
    </div>
  </div>
</body>
</html>
