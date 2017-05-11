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

?>
