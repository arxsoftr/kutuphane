<?php
session_start();
if(!isset($_SESSION['kullaniciadi'])){
  header("Location: index.php");
  exit();
}

$kullaniciadi = $_SESSION['kullaniciadi'];
require_once 'config.php';
$errors = array();

if ($conn->connect_error) {
  die("Bağlantı hatası: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $guncelleme_tarih = $_POST["guncelleme_tarih"];
  $guncelleme_ad = $_POST["guncelleme_ad"];
  $guncelleme_aciklama = $_POST["guncelleme_aciklama"];
  $guncelleme_surum = $_POST["guncelleme_surum"];
  
  $sql = "INSERT INTO guncellemeler (guncelleme_tarih, guncelleme_ad, guncelleme_aciklama, guncelleme_surum)
          VALUES ('$guncelleme_tarih', '$guncelleme_ad', '$guncelleme_aciklama', '$guncelleme_surum')";

  if ($conn->query($sql) === TRUE) {
    header('Location: guncelleme-kaydedildi.php');
    exit;
  } else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/panel.css">

  <meta charset="UTF-8">
  <title>Güncelle Ekle</title>
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

  
  <div id="form-container">
    <h1>Yeni Güncelleme Ekle</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <label for="gun">Tarih:</label>
      <input type="date" id="tarih" name="guncelleme_tarih">

      <label for="guncelleme_ad">Güncelleme Başlığı:</label>
      <input type="text" id="ad" name="guncelleme_ad">

        <label for="guncelleme_aciklama">Güncelleme Açıklaması:</label>
        <input type="text" id="aciklama" name="guncelleme_aciklama">

        <label for="guncelleme_surum">Güncelleme Sürümü:</label>
        <input type="text" id="surum" name="guncelleme_surum">

        <input type="submit" value="Kaydet">
    </form>
    </div>
</body>

</html>

