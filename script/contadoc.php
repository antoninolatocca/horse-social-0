<?php
$docs = 0;
$adress = "utenti/".$_SESSION['id']."/doc/";
if ($handle = opendir($adress)) {
$files = array(png, jpg, jpeg, gif);
while (false !== ($file = readdir($handle))) {
 if($file != '.' && $file != '..') $docs++;
}}
?>