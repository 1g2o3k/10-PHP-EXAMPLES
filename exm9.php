<?php
class Araba{
    public $marka;
    public $renk;
    public $km;
    public $yil;
    public function araba_bilgilerini_yaz($marka,$renk,$km,$yil){
        echo $marka.PHP_EOL.$renk.PHP_EOL.$km.PHP_EOL.$yil;
    }
}
$araba=new Araba();
$araba->$renk="mavi";
$araba->$marka="broadway";
$araba->$km="1000";
$araba->$yil="3";
$araba->araba_bilgilerini_yaz($araba->$marka,$araba->$renk,$araba->$km,$araba->$yil);
