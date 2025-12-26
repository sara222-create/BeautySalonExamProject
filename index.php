
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Salon de Beauté</title>
 
  <script src ="script.js" defer> </script>
  <link rel="stylesheet" href="style.css">
<style>
  body{
  margin:0;
  font-family: Arial, sans-serif;
  background: #fffafb;
  
}
header{
  background:url('https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9') center/cover ;
  height:300px;
  display:flex;
  justify-content:center;
  align-items:center;
  color:white;
}
header h1{
  background:rgba(0,0,0,0.6) !important;
  padding:20px;
  border-radius:15px;
  
  
}
.container{
  width:80%;
  margin:auto;
  padding:30px 0;
}
.services{
  display:flex;
  justify-content:space-between;
  margin-bottom:40px;
}
.service{
  width:30%;
  background:white;
  border-radius:10px;
  box-shadow:0 0 10px rgba(0,0,0,0.1);
  text-align:center;
}
.service img{
  width:100%;
  height:200px;
  object-fit:cover;
  border-radius:10px 10px 0 0;
}
.service h3{
  color:#e91e63;
  padding:15px;
}
.form-box{
  background:white;
  padding:30px;
  border-radius:10px;
  box-shadow:0 0 10px rgba(0,0,0,0.1);
}
.form-box h2{
  text-align:center;
  color:#e91e63;
}
form input, form select, form button{
  width:100%;
  padding:10px;
  margin:10px 0;
}
form button{
  background:#e91e63;
  color:white;
  border:none;
  cursor:pointer;
}
footer{
  background:#e91e63;
  color:white;
  text-align:center;
  padding:15px;
  margin-top:30px;
}

</style>

</head>

<body>

<header>
  
  <h1>🌸 Salon de Beauté 🌸<br>Réservation en ligne</h1>

</header>

<div class="container">

  <div class="services">
    <div class="service">
      <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035">
      <h3>Coiffure</h3>
    </div>
    <div class="service">
      <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e">
      <h3>Maquillage</h3>
    </div>
    <div class="service">
      <img src="https://images.unsplash.com/photo-1515377905703-c4788e51af15">
      <h3>Soins</h3>
    </div>
  </div>

  <div class="form-box">
    <h2>Prendre un rendez-vous</h2>

    <form action="save.php" method="POST" onsubmit="return validateForm()">
      <input type="text" name="nom" id="nom" placeholder="Nom complet">
      <input type="text" name="telephone" id="telephone" placeholder="Téléphone">

      <select name="service">
        <option>Coiffure</option>
        <option>Maquillage</option>
        <option>Soins</option>
      </select>

      <input type="date" name="date">
      <input type="time" name="heure">

      <button type="submit">Réserver</button>
    </form>
  </div>

</div>

<footer>
  © 2025 Salon de Beauté | Projet Web
  <footer>
  © 2025 Salon de Beauté | 
  <a href="admin.php" style="color: #fff; text-decoration: underline; margin-left: 10px;">دخول الإدارة 🔑</a>
  <a href="info.php" style="color: white; margin-left: 15px;">Infos & Contact</a>
</footer>
</footer>

</body>
</html>