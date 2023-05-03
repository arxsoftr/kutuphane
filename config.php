<?php
$servername = "localhost"; // Sunucu adı girin
$username = "kutuphanekullanici"; // Kullanıcı adı girin
$password = "1)lMV!B7apsGzz(c"; // Kullanıcı şifresi girin
$dbname = "kutuphane_db"; // Veritabanı adı

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Veritabanına bağlantı başarısız.: " . $conn->connect_error);
}
?>