<?php
$dbHost = '';// hôte (ex : localhost)
$dbName = '';// base de données
$dbUser = '';// utilisateur
$dbPass = '';// mot de passe

$dsn = 'mysql:dbname='.$dbName.';host='.$dbHost;

try {
  $dbConnect = new PDO($dsn, $dbUser, $dbPass);
} catch (PDOException $e) {
  echo 'Erreur de connexion : ' . $e->getMessage();
}
