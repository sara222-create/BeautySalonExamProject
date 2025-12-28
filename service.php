<?php
include "db.php";

if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit();
}

$service_id = (int) $_GET['id'];

$service = mysqli_fetch_assoc(
  mysqli_query($conn, "SELECT * FROM services WHERE id = $service_id")
);

if (!$service) {
  header("Location: index.php");
  exit();
}

$details = mysqli_query(
  $conn,
  "SELECT * FROM service_details WHERE service_id = $service_id"
);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title><?= $service['name'] ?></title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
  <h1><?= $service['name'] ?></h1>
</header>

<div class="container">

  <div class="details-container">
    <?php while($d = mysqli_fetch_assoc($details)) { ?>
      <div class="detail-card">
        <h3><?= $d['title'] ?></h3>
        <p>💰 Prix : <?= $d['price'] ?> DA</p>
        <p>⏱️ Durée : <?= $d['duration'] ?> min</p>
      </div>
    <?php } ?>
  </div>

  <div style="text-align:center; margin-top:30px;">
    <a href="index.php" style="color:#e91e63; font-weight:bold;">
      ← Retour à l’accueil
    </a>
  </div>

</div>

</body>
</html>