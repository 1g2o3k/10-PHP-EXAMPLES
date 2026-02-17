<?php
require_once "important.php";
// Başlangıç: döngü değişkeni
$x = true;

// Döngü başlıyor
while($x) {

    // PDO ile veritabanı bağlantısı
    $pdo_obj = new PDO("mysql:host=$host;dbname=$dbname", "$username", "$password");
    
    $pdo_obj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Kullanıcıdan tablo adı ve sütun bilgisi al
    $table_name = readline("Tablo adı: ");
    $column1 = readline("Sütun 1: ");
    $varch1 = readline("Uzunluk: ");
    $column2 = readline("Sütun 2: ");
    $varch2 = readline("Uzunluk: ");

    // Not: Burada kullanıcıdan gelen tablo ve sütun isimleri direkt SQL'e yazılıyor
    // Gerçek projede bu tehlikeli (SQL Injection). Şimdilik demo amaçlı.
    
    // SQL cümlesi: tablo oluşturuluyor
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id INT AUTO_INCREMENT PRIMARY KEY,
        $column1 VARCHAR($varch1),
        $column2 VARCHAR($varch2)
    )";

    // SQL çalıştırılıyor
    $pdo_obj->exec($sql);

    // Kullanıcıya tekrar sor
    $bl = readline("Tekrar tablo oluşturmak için E \nÇıkış için H: ");

    // Döngüyü kontrol et
    if(strtoupper($bl) == "E") {
        $x = true;  // Döngü devam
    } else {
        $x = false; // Döngü sonlanır
    }
}

?>
