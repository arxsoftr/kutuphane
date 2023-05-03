<?php
$servername = "localhost"; // Sunucu adı girin
$username = "kutuphanekullanici"; // Kullanıcı adı girin
$password = "sifre"; // Kullanıcı şifresi girin
$dbname = "dbname"; // Veritabanı adı

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Veritabanına bağlantı başarısız.: " . $conn->connect_error);
}
?>