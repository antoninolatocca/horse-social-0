<?php include 'header.php';include 'button_center.php';include 'pannello.php'; include 'text.php'; 
$path = "rance/images/";
echo '<div  style="position: absolute; width: 900px; left: 200px; top: 250px">
<img src="'.$sites.$path.'panoramica_campo_grande.jpg" width="900"><br><br><div class="centrata">';
if ($handle = opendir($path)) {
$files = array(png, jpg, jpeg, gif);
while (false !== ($file = readdir($handle))) {
 if($file != '.' && $file != '..') {
$files = $file;
if($files != "panoramica_campo_grande.jpg"){
echo '<img width="200" heigth="200" src="'.$path.$file.'" style="margin-right:10px; margin-bottom:10px;">';
} } } }
echo '</div></div>';
include 'script/banner/destra.html'; ?>