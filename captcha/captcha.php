<?php
session_start();
//Codice di 5 cifre (random)
$codice_random = sha1(microtime());
$codice_random = substr($codice_random, 0, 7);

//Creazione della immagine jpeg
$Immagine = imagecreatefrompng("captcha.png");

//Colore e selezione RGB
$Colore = imagecolorallocate($Immagine, 255, 255, 255);

//Risultato finale - creo l'immagine
imagestring($Immagine, 20, 75, 20, $codice_random, $Colore);
  
// Salvo nella sessione
$_SESSION['captcha'] = $codice_random;

//Visualizzo l'immagine per il captcha
header("Content-type: image/jpeg");
imagepng($Immagine);
?>