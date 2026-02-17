<?php 
require_once "important.php";

try {
    // PDO bağlantısı, hata raporlaması aktif
    $pdo_connect = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Bağlantı başarılı!";
} catch (PDOException $e) {
    // Bağlantı hatası durumunda kullanıcıya bilgi verilir
    die("Bağlantı hatası: " . $e->getMessage());
}

// Tabloyu oluşturma işlemi (IF NOT EXISTS ile tabloyu sadece var olmadığı takdirde oluştururuz)
try {
    $pdo_connect->exec("CREATE TABLE IF NOT EXISTS kitapci (
        id INT AUTO_INCREMENT PRIMARY KEY, 
        kitap_adi VARCHAR(50) NOT NULL, 
        kitap_ozeti VARCHAR(200) NOT NULL
         )");
    echo "Tablo başarıyla oluşturuldu ya da zaten mevcut.";
} catch (PDOException $e) {
    // Eğer tablo zaten varsa hata verir ama bu durumla ilgili ekstra bir işlem yapmaya gerek yoktur.
    echo "Tablo oluşturulamadı: " . $e->getMessage();
}

// Kullanıcıdan işlem tipi alınır
$islem = readline("Kitap eklemek için 1, kitap aramak için 2: ");

switch ($islem) {
    case '1':
        // Kitap ekleme işlemi
        echo "Kitap ekleme işlemine hoş geldiniz!\n";
        $kitap_adi = readline("Kitap adını yazınız: ");
        $kitap_ozeti = readline("Kitap özetini yazınız: ");
        
        // SQL Enjeksiyonu'na karşı prepared statements kullanarak güvenli bir şekilde veri ekliyoruz
        try {
            $stmt = $pdo_connect->prepare("INSERT INTO kitapci (kitap_adi, kitap_ozeti) VALUES (:kitap_adi, :kitap_ozeti)");
            $stmt->bindParam(':kitap_adi', $kitap_adi);
            $stmt->bindParam(':kitap_ozeti', $kitap_ozeti);
            $stmt->execute();
            echo "Kitap başarıyla eklendi!\n";
        } catch (PDOException $e) {
            echo "Kitap eklenemedi: " . $e->getMessage();
        }
        break;

    case '2':
        // Kitap arama işlemi
        $arakitap = readline("Aramak istediğiniz kitabın adını yazınız: ");
        
        try {
            // Kullanıcıdan gelen kitabı güvenli bir şekilde arıyoruz (prepared statements kullanılarak)
            $stmt = $pdo_connect->prepare("SELECT kitap_adi FROM kitapci WHERE kitap_adi = :kitap_adi");
            $stmt->bindParam(':kitap_adi', $arakitap);
            $stmt->execute();
            $kitap = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($kitap) {
                echo "Kitap bulundu: " . $kitap['kitap_adi'] . "\n";
            } else {
                echo "Aradığınız kitap mevcut değildir.\n";
            }
        } catch (PDOException $e) {
            echo "Arama işlemi sırasında bir hata oluştu: " . $e->getMessage();
        }
        break;

    default:
        echo "Geçersiz seçim yaptınız. Lütfen 1 ya da 2'yi seçin.\n";
        break;
}
