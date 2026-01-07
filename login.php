<?php
session_start();
if(isset($_POST['login'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    
    if($user == "admin" && $pass == "admin123"){
        $_SESSION['admin'] = "active";
        header("Location: admin.php");
    } else {
        $error = "بيانات الدخول خاطئة!";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>connexion</title>
    <style>
        body { font-family: Arial; background: #fce4ec; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-box { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 300px; text-align: center; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #e91e63; color: white; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Entrée de l'administration🔒</h2>
        <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="user" placeholder="nom de l'utilisateur" required>
            <input type="password" name="pass" placeholder="mot de passe" required>
            <button type="submit" name="login">دخول</button>
        </form>
    </div>
</body>
</html>