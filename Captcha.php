<?php
session_start();
$text = "";
for ($i = 0; $i < 4; $i++) {
    $text .= rand(0, 9);
}

$_SESSION["captcha"] = $text;

// Create image
$image = imagecreate(200, 50);
$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);
$font = 'The Golden Elephant.ttf';
$size_font = 25;
$kemiringan = rand(10, 20);

// Menambahkan Garis to background
for ($i = 0; $i < 10; $i++) {
    imageline($image, rand(0, 200), rand(0, 50), rand(0, 200), rand(0, 50), $white);
}

// Text
imagettftext($image, $size_font, $kemiringan, 60, 40, $white, $font, $text);

// Output 
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
