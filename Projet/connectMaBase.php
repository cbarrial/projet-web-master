  <?php
  // Fonction qui connecte à la base de données
    try
    {
    	$bdd = new PDO('mysql:host=localhost;dbname=petition;charset=utf8', 'root', '');
    }
    // Renvoie une erreur si il y a échec de connection
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

  ?>
