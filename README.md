# PHP Örnekleri Projesi

Bu proje, PHP programlama dilini öğrenmek ve pratik yapmak için hazırlanmış çeşitli örnek kodları içermektedir.

## İçerik

Proje içerisinde aşağıdaki konulara ait örnekler bulunmaktadır:

### Veritabanı İşlemleri
- **exm1.php** - PDO ile MySQL bağlantısı, tablo oluşturma, prepared statements ile güvenli veri ekleme ve veri çekme işlemleri
- **exm2.php** - While döngüsü kullanarak dinamik tablo oluşturma
- **exm5.php** - Öğrenci kayıt sistemi (çoklu kayıt ekleme)
- **exm6.php** - Kitapçı uygulaması (kitap ekleme ve arama)
- **exm8.php** - SQL Injection açığı içeren kötü örnek (nasıl yapılmaması gerektiğini gösterir)

### Döngüler
- **exm2.php** - While döngüsü ile tekrarlayan işlemler
- **exm3.php** - Fibonacci dizisi hesaplama (sonsuz döngü)
- **exm7.php** - For döngüsü ile 0'dan 10000'e sayma

### Dosya İşlemleri
- **exm4.php** - Dosya oluşturma, yazma ve okuma işlemleri

### Nesne Yönelimli Programlama (OOP)
- **exm9.php** - Araba sınıfı ile OOP temelleri
- **exm10.php** - Dört işlem sınıfı ile metot kullanımı

## Gereksinimler

- PHP 7.4 veya üzeri
- MySQL veritabanı
- `important.php` dosyasında veritabanı bağlantı bilgilerinin tanımlanması

## Veritabanı Yapılandırması

`important.php` dosyasını açarak veritabanı bağlantı bilgilerinizi girin:

```php
<?php
$dbname="veritabani_adi";
$host="localhost";
$username="kullanici_adi";
$password="sifreniz";
?>
```

## Kullanım

Her bir örneği çalıştırmak için terminalden:

```bash
php exm1.php
php exm2.php
# ... diğer örnekler için benzer şekilde
```

## Öğrenme Hedefleri

Bu proje ile aşağıdaki konuları öğrenebilirsiniz:

- PDO sınıfı ile veritabanı işlemleri
- Prepared statements kullanımı (SQL Injection önleme)
- While ve for döngüleri
- Dosya okuma ve yazma işlemleri
- Nesne Yönelimli Programlama (OOP) temelleri
- Switch case yapısı
- Kullanıcıdan veri alma (readline)

## Önemli Not

`exm8.php` dosyası SQL Injection açığı içeren kötü bir kod örneğidir. Bu tür kod yazımından kaçınılması gerektiğini göstermek amacıyla dahil edilmiştir. Gerçek projelerde mutlaka prepared statements kullanın!



