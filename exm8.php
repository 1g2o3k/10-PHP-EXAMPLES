<?php
require_once "important.php";
try {       
    $pdo=new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
} catch (PDOException $th) {
    exit("bağlantı hatası".$th->getMessage());
}
try {
    $pdo->query("create table hastahaneler (id int auto_increment primary key,hasta_ad varchar(50),hasta_ad_soyad varchar(50);");
} catch (PDOException $th) {
    die($th);
}
$ad=readline("hasta adı:");
$soy_ad=readline("soy_ad:");
$pdo->query("insert into hastahaneler(hasta_ad,hasta_ad_soyad)value('$value','$soyad');");

