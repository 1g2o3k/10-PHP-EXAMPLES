<?php
//  Kullanıcıdan dosya adı al
$filename = readline("Dosya adı: ");

//  Dosyayı yazma modunda aç
$file = fopen($filename, "w") or die("Dosya açılamadı!");

//  Kullanıcıdan dosya içeriği al
$content = readline("Dosya içeriği: ");

// Dosyaya yaz
fwrite($file, $content);

//  Dosyayı kapat
fclose($file);

//  Dosyayı okuma modunda aç
$file = fopen($filename, "r") or die("Dosya açılamadı!");

//  Dosya boyutunu al
$filesize = filesize($filename);

// Dosya içeriğini oku
$fileContent = fread($file, $filesize);

//  Dosyayı kapat
fclose($file);

//  Dosya içeriğini ekrana yazdır
echo "Dosya içeriği:\n";
echo $fileContent . PHP_EOL;
?>
