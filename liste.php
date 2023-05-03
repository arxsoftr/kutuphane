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

// kitap silme işlemi
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $conn->query("DELETE FROM kitaplar WHERE id=$id");
  header('location: kitaplar.php');
}

// kitap düzenleme işlemi
if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $ogrenci = $_POST['ogrenci'];
  $yazar_ad = $_POST['yazar_ad'];
  $kitap_ad = $_POST['kitap_ad'];
  $kitap_tur = $_POST['kitap_tur'];
  
  $conn->query("UPDATE kitaplar SET ogrenci='$ogrenci', yazar_ad='$yazar_ad', kitap_ad='$kitap_ad', kitap_tur='$kitap_tur' WHERE id=$id");
  header('location: kitaplar.php');
}

// kitapları listeleme işlemi
$sql = "SELECT * FROM kitaplar";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    
  <link rel="stylesheet" href="css/link.css">
  <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/panel.css">
  <meta charset="UTF-8">
  <title>Kitap Listesi</title>
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


  <div>
    <h1>Kitap Listesi</h1>
    <table>
      <thead>
        <tr>
          <th>Öğrenci İsim</th>
          <th>Yazar Adı</th>
          <th>Kitap Adı</th>
          <th>Kitap Türü</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['ogrenci']; ?></td>
          <td><?php echo $row['yazar_ad']; ?></td>
          <td><?php echo $row['kitap_ad']; ?></td>
          <td><?php echo $row['kitap_tur']; ?></td>
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



