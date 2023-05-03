<?php
session_start();
if(isset($_SESSION['kullaniciadi'])){
  header("Location: kaydet.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Giriş Yap</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <div class="login">
    <h2>Giriş Yap</h2>
    <?php
    if(isset($_SESSION['errors'])){
      echo '<div style="color: red;">';
      foreach ($_SESSION['errors'] as $error) {
        echo $error . "<br>";
      }
      echo '</div>';
      unset($_SESSION['errors']);
    }
    ?>
    <form method="POST" action="giris.php">
      <label for="kullaniciadi">Kullanıcı Adı:</label>
      <input type="text" id="kullaniciadi" name="kullaniciadi">

      <label for="sifre">Şifre:</label>
      <input type="password" id="sifre" name="sifre">

      <input type="submit" value="Giriş Yap">
    </form>
  </div>

</body>
<footer>
  <div>
    <style>
      footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        text-align: center;
        font-size: 12px;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
      }
      .arx {
        text-decoration: none;
      }
      .arx p {
        color: #000;
      }
      .arx:hover {
        text-decoration: none;
      }

    </style>
    <img src="https://arxdevelopers.github.io/assets/img/arx-logo.png" alt="ARX" width="50" height="50">
    <div class="arx">
      <a href="https://arxdevelopers.github.io"><p>ArX Developers</p></a>
    </div>
  </div>
</footer>
</html>
