<?php
$servername = "localhost:3306";
$username = "nei33bcom_sahrasinav";
$password = "sahrasinav";
$dbname = "nei33bcom_sahrasinav";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Bağlantı hatası: " . $conn->connect_error);
}

$ogrenci = $_POST["ogrenci_no"];
$yazar_ad = $_POST["yazar_ad"];
$kitap_ad = $_POST["kitap_ad"];
$kitap_tur = $_POST["kitap_tur"];

$sql = "INSERT INTO kitaplar (ogrenci, yazar_ad, kitap_ad, kitap_tur) VALUES ('$ogrenci', '$yazar_ad', '$kitap_ad', '$kitap_tur')";

if ($conn->query($sql) === TRUE) {
  header('Location: kaydedildi.html');
  exit;
} else {
  echo "Hata: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
