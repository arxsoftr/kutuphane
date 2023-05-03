<?php
session_start();
include_once 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(!isset($_SESSION['kullaniciadi'])){
  header("Location: index.php");
  exit();
}
$kullaniciadi = $_SESSION['kullaniciadi'];
$errors = array();
$success = array();


if(isset($_POST['update'])){
  $kullaniciadi = $_POST['kullaniciadi'];
  $sifre = $_POST['sifre'];


  if(empty($errors)){
    $conn->query("UPDATE kullanicilar SET kullaniciadi='$kullaniciadi', sifre='$sifre'");
    $success[] = 'Profiliniz başarıyla güncellendi.';
  }
}

$result = $conn->query("SELECT kullaniciadi, sifre FROM kullanicilar");
$row = $result->fetch_assoc();

?>


<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">

    <link rel="stylesheet" href="css/profil-duzenle.css">
    <link rel="stylesheet" href="css/panel.css">
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
  <title>Profil Düzenle</title>
</head>
<title>Profil Düzenle</title>
<body>
<nav class="navbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="panel.php" class="nav-link"><i class="fa fa-home"></i> Panel</a>
      </li>
      <li class="nav-item">
        <a href="https://discord.gg/xFsKXkmnbJ" class="nav-link"><i class="fa fa-link"></i> Discord</a>
      </li>
    </ul>
    <ul class="navbar-profile">
  <li class="nav-item">
    <a href="#" class="nav-link">
      <div class="user-info">
        <i class="fa fa-user"></i>
        <?php echo $kullaniciadi; ?>
      </div>
    </a>
    <ul class="dropdown">
      <li><a href="profil-duzenle.php">Profil Düzenle</a></li>
      <li><a href="cikis.php">Çıkış Yap</a></li>
    </ul>
  </li>
</ul>

  </nav>


  <div class="div1">
    <h1>Profil Düzenle</h1>

    <?php if(!empty($errors)): ?>
    <div>
      <ul>
        <?php foreach($errors as $error): ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php endif; ?>

    <?php if(!empty($success)): ?>
    <div>
      <ul>
        <?php foreach($success as $message): ?>
          <li><?php echo $message; ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php endif; ?>

    <form method="post" action="profil-duzenle.php">
      <label for="kullaniciadi">Kullanıcı Adı:</label>
      <input type="text" id="kullaniciadi" name="kullaniciadi" value="<?php echo $row['kullaniciadi']; ?>">
      <br>
      <label for="sifre">Şifre:</label>
      <input type="password" id="sifre" name="sifre" value="">
      <br>
      <button type="submit" name="update">Güncelle</button>
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
