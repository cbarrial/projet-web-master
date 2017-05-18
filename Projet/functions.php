  <?php
  function testAcces() {
    if (!isset($_SESSION['connecte'])) die("Access interdit.");
  }

  function connectMaBase(){
    try
    {
    	$bdd = new PDO('mysql:host=localhost;dbname=petition;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
  }

  function transfert ()
    {
      $ret = false;
      $img_blob = '';
      $img_taille = 0;
      $img_type = '';
      $img_nom = '';
      $taille_max = 250000;

      $ret = is_uploaded_file ($_FILES['fic']['tmp_name']);
      if ( !$ret )
      {
        echo "Problème de transfert";
        return false;
      }
      else
      {
          // Le fichier a bien été reçu
          $img_taille = $_FILES['fic']['size'];
          if ( $img_taille > $taille_max )
          {
            echo "Trop gros !";
            return false;
          }
          $img_type = $_FILES['fic']['type'];
          $img_nom = $_FILES['fic']['name'];
          try
          {
          	$bdd = new PDO('mysql:host=localhost;dbname=petition;charset=utf8', 'root', '');
          }
          catch (Exception $e)
          {
                  die('Erreur : ' . $e->getMessage());
          }

          $req =$bdd->prepare( "INSERT INTO petitions  (img_nom, img_taille, img_type, img_blob)
                              VALUES (:img_nom, :img_taille, :img_type, :img_blob, addslashes ($img_blob)) ");
          $req->bindValue(':img_nom', $img_nom, PDO::PARAM_STR);
          $req->bindValue(':img_taille', $img_taille, PDO::PARAM_STR);
          $req->bindValue(':img_type', $img_type, PDO::PARAM_STR);
          $req->bindValue(':img_blob', $img_blob, PDO::PARAM_STR);
          $req->execute();
        }
      }

  ?>
