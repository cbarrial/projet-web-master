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
                <li role="presentation"><a href="pageacceuil.php">Accueil</a></li>
                <li role="presentation" class="active"><a href="Petitions.html">Parcourir</a></li>
                <li role="presentation"><a href="connexion2.php">Connexion</a></li>
                <li><a href="inscription2.php">Inscription</a></li>
              </ul>
            </nav>
          </div>
        </div>
          <div style='position: absolute; top: 150px; left: 320px'>
            <ul class="nav nav-tabs" style="color: #808080">
          <li role="presentation" class="active"  style="color: #8080"><a href="Petitions.php">Pétitions</a></li>
          <li role="presentation" style="color: #8080"><a href="PetitionsPolitiques.php">Pétitions Politiques</a></li>
          <li role="presentation" style="color: #8080"><a href="PetitionsEducation.php">Pétitions Education</a></li>
          <li role="presentation" style="color: #8080" class="active"><a href='#'>Pétitions Feministes</a></li>
          <li role="presentation" style="color: #8080"><a href='PetitionsSports.php'>Pétitions Sports</a></li>
          <li role="presentation" style="color: #8080"><a href='PetitionsJustice.php'>Pétitions Justice</a></li>
          <li role="presentation" style="color: #8080"><a href='PetitionsEnvironment.php'>Pétitions Environment</a></li>
        </ul>
      </div>
    </nav>


    <div class="row" style="margin-top: 200px; ">
    <?php
    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=petition;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }

    $pet=$bdd->query('SELECT Titre, Texte FROM petitions WHERE categorie=\'feministe\' ORDER BY ID DESC LIMIT 0, 3');

    while ($donnees = $pet->fetch())
    {
      ?>

      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <!-- <div style=" width: 242px; height: 200px; background:url(usain-bolt-pose2.jpg); background-size: cover"></div> -->
          <img src="usain-bolt-pose2.jpg" alt="erreur">
          <div class="caption">
            <?php echo '<h3>' . htmlspecialchars($donnees['Titre']) . '</h3>'; ?>
            <?php echo '<p>' . htmlspecialchars($donnees['Texte']) . '</p>'; ?>
            <p><a href="#" class="btn btn-primary" role="button">Consulter</a> <a href="#" class="btn btn-default" role="button">Modifier</a></p>
          </div>
        </div>
      </div>

      <?php
      }

      $pet->closeCursor();
      ?>

    </div>

  </div>
</div>
      </div>
    </div>
  </div>
</body>
</html>