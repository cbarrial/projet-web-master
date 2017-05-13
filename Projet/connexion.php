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
<body background = "/net/t/cbarrial/Prog_Web/Projet/manif.jpg">

    <div class="site-wrapper">
      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Pétitions</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li role="presentation"><a href="pageacceuil.html">Accueil</a></li>
                  <li role="presentation"><a href="decpet.html">Parcourir</a></li>
                  <li role="presentation" class="active"><a href="connexion2.html">Connexion</a></li>
                  <li role="presentation"><a href="inscription.html">Inscription</a></li>
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

                  <form action="/users/login" name="login" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
                    <div class="form-group">
                      <div class="col-md-8"><input name="username" placeholder="Idenfiant" class="form-control" type="text" id="UserUsername"/></div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8"><input name="password" placeholder="Mot de passe" class="form-control" type="password" id="UserPassword"/></div>
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

    <?php
    // Le mot de passe n'a pas été envoyé
    if (!isset($_POST['mot_de_passe']))
    {
      echo '<p>Vous n\'avez pas rentré de mot de passe !</p>';
    }
    // Le mot de passe a été envoyé et il est pas bon
  elseif ($_POST['mot_de_passe'] !="kangourou")
  {

    echo '<p>Le mot de passe est incorrect !</p>';
  }
  // Le mot de passe a été envoyé et il est bon
  else
  {
    ?>
        <h1>Voici les codes d'accès :<h1>
        <p><strong>CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV</strong></p>

        <p> Cette page est réservé au personnel !</p>
        <?php
      }
      ?>

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
