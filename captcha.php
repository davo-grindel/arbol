<?php
session_start();
header('Content-Type: image/gif');
function ramdontext($leng) {
	 $key="";
	 $patron = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
	 for ($i=0;$i<$leng;$i++){
		 $key .= substr($patron,mt_rand(0,61),1);
		 }
	 return $key;
	 }
 $_SESSION["captcha"] = ramdontext(5);

header('Content-Type: image/gif');
$img = imagecreate(100,40);
$fondo = imagecolorallocate ($img,11,120,99);
$cletras = imagecolorallocate($img,0,0,0);
$cline = imagecolorallocate($img,233,239,239);
imageline($img,0,0,39,29,$cline);
imageline($img,10,10,34,29,$cline);
imagestring($img,5,30,12,$_SESSION["captcha"],$cletras);


imagegif($img);
imagedestroy($img);

 
 ?>