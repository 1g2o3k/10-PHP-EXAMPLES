<?php
// Fibonacci dizisini tutacak liste
$list = [];

// Döngü kontrolü
$x = true;

// Başlangıç değerleri
$a = 0;
$b = 1;

// Sonsuz döngü (manuel olarak durdurabilirsiniz)
while ($x) {

    // Fibonacci sayısını hesapla
    $fib = $a;

    // Listeye ekle
    array_push($list, $fib);

    // Sonraki Fibonacci sayısı için güncelle
    $next = $a + $b;
    $a = $b;
    $b = $next;

    // Listeyi ekrana yazdır
    foreach ($list as $idx => $val) {
        echo "Fibonacci #".($idx+1).": ".$val.PHP_EOL;
    }

    // 2 saniye bekle
    sleep(2);
}
?>
