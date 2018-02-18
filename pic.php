<?php

session_start();

    $text = "Поздравляю!" . PHP_EOL . "Вы прошли тест!" . PHP_EOL . "Данный сертификат удостоверяет, что" . PHP_EOL . $_SESSION['user']['username'] . PHP_EOL . "прошел(шла) тест с результатом" . PHP_EOL . $_SESSION['res'] . "%";

$_SESSION['text'] = $text;

$image = imagecreatetruecolor(1020,1020);
$backcolor = imagecolorallocate($image,255,224,221);
$textcolor = imagecolorallocate($image,209,100,100);
$boxfile = '../sessions/picture.png';
if(!file_exists($boxfile)){
    echo 'Картинка не найдена';
}
$imbox = imagecreatefrompng($boxfile);
imagefill($image,0,0,$backcolor);
imagecopy($image, $imbox, 10, 10, 0, 0, 1000,1000);
$fontfile = '../sessions/a_Alterna.ttf';
imagettftext($image, 25, 0, 270, 350, $textcolor, $fontfile, $text);
header('Content-type: $image/png');
imagepng($image);
imagedestroy($image);