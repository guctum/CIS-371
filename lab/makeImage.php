<?PHP


header('Content-Type: image/png');

$im = imagecreatetruecolor(400,30);


$white=imagecolorallocate($im, 255, 255, 255);


$black=imagecolorallocate($im, 0, 0, 0);


imagefilledrectangle($im,0,0,399,29,$white);


 


$d=date("h:i:s");


$text = "Hello World! ".$d;


 


$font='dungeon.ttf';


imagettftext($im, 20,0,11,21, $black, $font, $text);


imagepng($im);


imagedestroy($im);


 


?>
