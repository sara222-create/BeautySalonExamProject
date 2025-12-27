<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "salon_de_beauty_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
  die("Erreur de connexion à la base de données");
}
?>