<?php
require_once "important.php";
// Veritabanı bağlantısı PDO ile oluşturuluyor
try {
    $pd = new PDO("mysql:host=$host;dbname=$dbname", "$username", "$password");
    $pd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Hataları yakalamak için
} catch (PDOException $e) {
    die("Veritabanı bağlantısı başarısız: " . $e->getMessage());
}

//  Tablo oluşturuluyor, yoksa oluştur
$pd->query("
    CREATE TABLE IF NOT EXISTS tablo(
        id INT AUTO_INCREMENT PRIMARY KEY,
        baslik VARCHAR(50),
        yazi TEXT
    )
");

// Kullanıcıdan başlık ve yazı alınıyor
$baslik = readline("Başlık yazınız: ");
$yazi = readline("Yazı yazınız: ");

//  SQL Injection'a karşı hazırlıklı INSERT işlemi
$stmt = $pd->prepare("INSERT INTO tablo(baslik, yazi) VALUES (:baslik, :yazi)");
$stmt->bindParam(':baslik', $baslik);
$stmt->bindParam(':yazi', $yazi);
$stmt->execute(); // Veritabanına ekleme yapılır

//  Tablodaki tüm veriler çekilip ekrana yazdırılıyor
$stmt2 = $pd->query("SELECT baslik, yazi FROM tablo");
foreach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $yazz) {
    echo "Başlık: " . $yazz["baslik"] . PHP_EOL;
    echo "Yazı: " . $yazz["yazi"] . PHP_EOL;
    echo "----------------------" . PHP_EOL;
}
?>
