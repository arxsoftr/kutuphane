<?php
include_once 'config.php';

session_start();
if(!isset($_SESSION['kullaniciadi'])){
  header("Location: index.php");
  exit();
}
$kullaniciadi = $_SESSION['kullaniciadi'];

require_once 'config.php';
$errors = array();
$sql = "SELECT * FROM guncellemeler";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Güncellemeler</title>
  <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/panel.css">
  <link rel="stylesheet" href="css/guncellemeler.css">
</head>
<body>
<script>
  document.querySelector('.navbar-profile').addEventListener('click', function() {
    document.querySelector('.dropdown').classList.toggle('active');
  });
</script>

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
  <h1>Güncellemeler</h1>
  <div>
    <table>
      <thead>
        <tr>
          <th>Güncelleme Tarihi</th>
          <th>Güncelleme Adı</th>
          <th>Güncelleme Açıklama</th>
          <th>Güncelleme Sürümü</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['guncelleme_tarih']; ?></td>
          <td><?php echo $row['guncelleme_ad']; ?></td>
          <td><?php echo $row['guncelleme_aciklama']; ?></td>
          <td><?php echo $row['guncelleme_surum']; ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
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
