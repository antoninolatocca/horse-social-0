<?php
$id=$_SESSION['id'];
$fotoes = 0;
$path = "utenti/".$_SESSION['id']."/immagini/foto/";
if ($handle = opendir($path)) {
while (false !== ($file = readdir($handle))) {
 if($file != '.' && $file != '..') $fotoes++; }}
$fotoes123 = 0;
$pathuser = "utenti/".$iduser."/immagini/foto/";
if ($handle2 = opendir($pathuser)) {
while (false !== ($file321 = readdir($handle2))) {
if($file321 != '.' && $file321 != '..') $fotoes123++; } }
$i22 = 0;
$pathcavallo123 = 'horses/'.$idcavallo.'/foto/';
if ($handle222 = opendir($pathcavallo123)) {
while (false !== ($filehorses = readdir($handle222))) {
if($filehorses != '.' && $filehorses != '..')  $i22++;  } }
?>