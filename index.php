<?php
include "db.php";
$services = mysqli_query($conn, "SELECT * FROM services");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Salon de Beauté</title>
 
  <script src ="script.js" defer> </script>
  <link rel="stylesheet" href="style.css">

</head>

<body>
<nav class="breadcrumb">
  <span>Accueil</span>
</nav>

<header>
  
  <h1>🌸 Salon de Beauté 🌸<br>Réservation en ligne</h1>

</header>




<div class="container">

  <div class="services">
    <?php while($service = mysqli_fetch_assoc($services)) { ?>
      <div class="service"
           onclick="window.location.href='service.php?id=<?= $service['id'] ?>'">
        <img src="<?= $service['image'] ?>" alt="<?= $service['name'] ?>">
        <h3><?= $service['name'] ?></h3>
      </div>
    <?php } ?>
  </div>

  <div class="form-box">
    <h2>Prendre un rendez-vous</h2>
    <div id="confirmation"></div>

    <form action="save.php" method="POST" onsubmit="return validateForm()">
      <input type="text" name="nom" id="nom" placeholder="Nom complet">
<input type="text" name="telephone" id="telephone" placeholder="Téléphone" maxlength="10" minlength="10">


     <select name="service" required>
  <option value="">-- Choisir un service --</option>

  <optgroup label="Coiffure">
    <option value="Brushing">Brushing</option>
    <option value="Lissage">Lissage</option>
    <option value="Coiffure mariage">Coiffure mariage</option>
  </optgroup>

  <optgroup label="Soins">
    <option value="Soin visage">Soin visage</option>
    <option value="Masque hydratant">Masque hydratant</option>
    <option value="Nettoyage de peau">Nettoyage de peau</option>

  </optgroup>

  <optgroup label="Maquillage">
    <option value="Maquillage simple">Maquillage simple</option>
    <option value="Maquillage soirée">Maquillage soirée</option>
    <option value="Maquillage mariée">Maquillage mariée</option>
  </optgroup>
</select>

      <input type="date" name="date" min="<?php echo date('Y-m-d'); ?>">
       <input type="time" name="heure">

      <button type="submit">Réserver</button>
    </form>
  </div>

</div>

<footer>
  © 2025 Salon de Beauté | Projet Web
  <footer>
  © 2025 Salon de Beauté | 
  <a href="admin.php" style="color: #fff; text-decoration: underline; margin-left: 10px;">Entrée de l'administration🔑</a>
  <a href="info.php" style="color: white; margin-left: 15px;">Infos & Contact</a>
</footer>
</footer>

</body>
</html>