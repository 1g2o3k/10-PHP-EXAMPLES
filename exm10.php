<?php
class Dort_islem{
public $say_1;
public $say_2;
function topla($say_1,$say_2):int {
    return $say_1+$say_2;
}
function cikartma($say_1,$say_2):int {
    return $say_1-$say_2;
}
function carpma($say_1,$say_2):int {
    return $say_1*$say_2;
}
function bolme($say_1,$say_2):int {
    return $say_1/$say_2;
}
}
$dort_islem=new Dort_islem();
$dort_islem->$say_1=5;
$dort_islem->$say_2=5;
echo $dort_islem->topla($say_1,$say_2);
echo $dort_islem->cikartma($say_1,$say_2);
echo $dort_islem->carpma($say_1,$say_2);
echo $dort_islem->bolme($say_1,$say_2);