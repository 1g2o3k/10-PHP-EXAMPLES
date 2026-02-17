<?php
require_once "important.php";

try {
    
    $pd = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}

// Tablo oluşturma (sentaks düzeltildi)
$pd->exec("
    CREATE TABLE IF NOT EXISTS ogrenci (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ad VARCHAR(50) NOT NULL,
        soyad VARCHAR(50) NOT NULL,
        bolum VARCHAR(100) NOT NULL
    )
");

// Hazır ifade (SQL injection engellendi)
$stmt = $pd->prepare("
    INSERT INTO ogrenci (ad, soyad, bolum)
    VALUES (:ad, :soyad, :bolum)
");

$st = true;

while ($st) {

    $ad = trim(readline("Öğrenci adı: "));
    $soyad = trim(readline("Öğrenci soyadı: "));
    $bolum = trim(readline("Öğrenci bölümü: "));

    $stmt->execute([
        ':ad' => $ad,
        ':soyad' => $soyad,
        ':bolum' => $bolum
    ]);

    echo "Kayıt eklendi." . PHP_EOL;

    $devam = readline(
        "Devam etmek için 1, çıkmak için 2 yazınız: "
    );

    if ($devam == "1") {
        $st = true;
    } elseif ($devam == "2") {
        $st = false;
    } else {
        echo "Geçersiz seçim. Program sonlandırılıyor." . PHP_EOL;
        $st = false;
    }
}

echo "Program sonlandı." . PHP_EOL;
?>
