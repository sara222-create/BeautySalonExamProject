<?php
include "db.php";

$nom       = $_POST['nom'];
$telephone = $_POST['telephone'];
$service   = $_POST['service'];
$date      = $_POST['date'];
$heure     = $_POST['heure'];

$sql = "INSERT INTO reservations (nom, telephone, service, date_rdv, heure)
        VALUES ('$nom', '$telephone', '$service', '$date', '$heure')";

if (mysqli_query($conn, $sql)) {
  header("Location: index.php");
} else {
  echo "Erreur lors de l'enregistrement";
}
?>