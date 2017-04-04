<?php

header("Content-type: image/png");
$string = 'test';
$im     = imagecreatefrompng("https://img.in.th/images/625ad187dca740ce48ad4688a97d6fef.png");
$orange = imagecolorallocate($im, 220, 210, 60);
$px     = (imagesx($im) - 7.5 * strlen($string)) / 2;
imagestring($im, 3, $px, 9, $string, $orange);
imagepng($im);
imagedestroy($im);

echo "OK";
?>
