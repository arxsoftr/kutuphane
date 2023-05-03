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
  $ogrenci = $_POST["ogrenci_no"];
  $yazar_ad = $_POST["yazar_ad"];
  $kitap_ad = $_POST["kitap_ad"];
  $kitap_tur = $_POST["kitap_tur"];

  $sql = "INSERT INTO kitaplar (ogrenci, yazar_ad, kitap_ad, kitap_tur) VALUES ('$ogrenci', '$yazar_ad', '$kitap_ad', '$kitap_tur')";

  if ($conn->query($sql) === TRUE) {
    header('Location: kaydedildi.php');
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
  <title>Kitap Ekle</title>
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
    <h1>Kitap Kayıt Formu</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <label for="ogrenci">Öğrenci İsim:</label>
      <input type="text" id="ogrenci" name="ogrenci_no">

      <label for="yazar_ad">Yazar Adı:</label>
      <input type="text" id="yazar_ad" name="yazar_ad">

      <label for="kitap_ad">Kitap Adı:</label>
      <input type="text" id="kitap_ad" name="kitap_ad">

      <label for="kitap_tur">Kitap Türü:</label>
      <select id="kitap_tur" name="kitap_tur">
        <option value="Roman">Roman</option>
        <option value="Öykü">Öykü</option>
        <option value="Şiir">Şiir</option>
        <option value="Drama">Drama</option>
      </select>

      <input type="submit" value="Kaydet">
    </form>
  </div>
</body>
</html>
