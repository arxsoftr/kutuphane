<?php
// By ArX Developers
session_start();
if(!isset($_SESSION['kullaniciadi'])){
  header("Location: index.php");
  exit();
}

$kullaniciadi = $_SESSION['kullaniciadi'];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Panel</title>
  <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/panel.css">
</head>
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


  <div class="container">
    <main>
      <div class="boxes">
      <main>
      <div class="boxes">
        <a href="kaydet.php" class="box">
          <div class="icon">
            <i class="fa fa-plus"></i>
          </div>
          <div class="box-text">
            <h3>Kitap Ekle</h3>
            <p>Yeni bir kitap ekleyin</p>
          </div>
        </a>

        <a href="guncelleme.php" class="box">
          <div class="icon">
            <i class="fa fa-bell"></i>
          </div>
          <div class="box-text">
            <h3>Güncellemeler</h3>
            <p>Yeni güncellemeleri kontrol edin</p>
          </div>
        </a>


        <a href="liste.php" class="box">
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <div class="box-text">
            <h3>Kitaplar Listesi</h3>
            <p>Tüm kitaplarınızı görüntüleyin</p>
          </div>
        </a>

        <a href="guncelleme-ekle.php" class="box">
          <div class="icon">
            <i class="fa fa-plus"></i>
          </div>
          <div class="box-text">
            <h3>Güncelleme Ekle</h3>
            <p>Güncelleme ekleyin</p>
          </div>
        </a>
      </div>
    </main>
      </div>
    </main>
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

