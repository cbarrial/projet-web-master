<?php
$fichier_compteur = fopen('compteur.txt', 'r+');
$vues = fgets($fichier_compteur);
$vues +=1;
fseek($fichier_compteur, 0);
fputs($fichier_compteur, $vues);
fclose($fichier_compteur);

header('Location: /Pagepetition.php');
  ?>
