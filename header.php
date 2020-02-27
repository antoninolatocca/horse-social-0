<?php 
include 'config.php';
connect();
session_start();
$URLPAGE = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
?>
<!doctype html>
<html lang="it">
<head>
<meta charset="windows-1252">
<?php
$sites = "http://hightterabyte.altervista.org/";
$log = $sites."images/HS/HS_50.png";
// ?'.time().' per aggiornare i CSS
echo '<link rel="stylesheet" type="text/css" href="'.$sites.'css/homepag.css">
<link rel="stylesheet" type="text/css" href="'.$sites.'css/stile.css">
<link rel="stylesheet" type="text/css" href="'.$sites.'css/mobile.css?'.time().'">
<link rel="stylesheet" type="text/css" href="'.$sites.'css/div.css">
<link rel="stylesheet" type="text/css" href="'.$sites.'css/articoli.css">
<link rel="stylesheet" type="text/css" href="'.$sites.'css/gallery.css">
<link rel="stylesheet" type="text/css" href="'.$sites.'css/menu.css">
<link rel="stylesheet" type="text/css" href="'.$sites.'css/font.css">
<link rel="stylesheet" type="text/css" href="'.$sites.'css/galleryanteprima.css">
<link rel="stylesheet" type="text/css" href="'.$sites.'css/mex.css">
<script type="text/javascript" src="'.$sites.'script/copertinagifanimataoff.js"></script>
<script type="text/javascript" src="'.$sites.'script/shadowbox.js"></script>';
// <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
// <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
echo '<script type="text/javascript">Shadowbox.init();</script>';
echo '<title>Horse Social ';
if(isset($_SESSION['utente'])){
$id = $_SESSION['id']; 
$querydatiuser = mysql_query("SELECT * FROM utenti WHERE id = '$id'"); 
$rowquerydatiuser = mysql_fetch_array($querydatiuser); 
echo '['.$rowquerydatiuser['nome'].' '.$rowquerydatiuser['cognome'].']'; 
}
echo '</title>';
include 'script/areagalleryjs.php'; ?>
<meta name="keywords" content="cavalli, equitazione, giornalino, utenti, monta">
<meta name="description" content="Il social network degli appassionati del mondo del cavallo">
</head>

<?php
if(isset($_SESSION['utente'])){
$bgcolor = $rowquerydatiuser['bkcolor']; 
}else{
$bgcolor ="#622100"; 
}
echo '<body style="background:'.$bgcolor.';">'; 
$datenow = date("Y-m-d H:i:s");
if(isset($_SESSION['utente'])){

//Ricerca
$cercastate = "Cerca o fai una domanda"; 
$querysea = $_GET['q'];
echo '<div id="Ricerca" style="z-index:1"><fieldset><legend style="color: #FFFFFF;">Cerca nel sito</legend>
<form method="get" action="'.$sites.'search.php?q=$querysea">
<li class="allineatext"><input type="text" style="width:190px;" id="q" name="q" onclick="if (this.value==\''.$cercastate.'\') 
this.value=\'\';" onblur="if (this.value==\'\') this.value=\''.$cercastate.'\';"
type="text" value="'.$cercastate.'" value="'.$cercastate.'"/></li>
<li class="allineabotton"><input type="submit" name="search" id="search" value="Cerca" class="defaultbutton"></li>
</form></fieldset></div>
  
<div id="sviluppatori"><p class="createdby">Sviluppato da <a href="'.$sites.'user.php?ID=1"><b>Antonino</b></a> <i>&</i> <a href="'.$sites.'user.php?ID=6"><b>Federico</b></a> </p></div></div>';
} 
include 'script/setoffline.php';

// menu
echo '<ul id="mymenu">';
echo '<li><a href="'.$sites.'index.php"><img class="imgbarraprofilo" height="25" width="25" src="'.$log.'" alt="logo"/><b><span class="utente">Home</span></b></a></li>';
if(isset($_SESSION['utente'])){
echo '<li><a href="'.$sites.'ufficio.php"><b>Redazione</b></a><ul>
<li><a href="'.$sites.'articoli.php">Articoli</a></li>
<li><a href="'.$sites.'store.php">Store</a></li>
<li><a href="'.$sites.'ufficio.php">Ufficio</a></li>
</ul></li>
<li><a href="'.$sites.'maneggio.php?ID=2&P=1"><b>Circoli ippici</b></a><ul>
<li><a href="'.$sites.'maneggio.php?ID=2&P=1">Centro Equestre La Gabbianella</a></li>
<li><a href="'.$sites.'maneggio.php?ID=3&P=1">Tucci Team A.S.D.</a></li>
<li><a href="'.$sites.'nuovo.php">+ Crea il tuo sito con noi</a></li>
</ul></li>
<li><a href="'.$sites.'extra.php"><b>Contenuti</b></a><ul>
<li><a href="'.$sites.'annunci.php">Annunci</a></li>
<li><a href="'.$sites.'answer.php">Answer</a></li>
<li><a href="'.$sites.'denunce.php">Denunce</a></li>
<li><a href="'.$sites.'extra.php">Lezioni</a></li>
<li><a href="'.$sites.'recensioni.php">Recensioni</a></li>
</ul></li>';
}
echo '<li><a href="'.$sites.'info.php"><b>Informativa</b></a></li>';
if($_SESSION['id'] == 1 OR $_SESSION['id'] == 6){
echo '<li><a href="'.$sites.'123.regedit.php"><b>Registro</b></a></li>';
}
echo '<div class="menuutente">';
if(isset($_SESSION['utente'])){
$amiciNUM = mysql_num_rows(mysql_query("SELECT * FROM amicizie WHERE  id_amico_1='$id' OR id_amico_2='$id'")); 
$Nmsg = mysql_num_rows(mysql_query("SELECT * FROM messaggi WHERE id_destinatario ='$id' AND letto = 0"));
include 'script/contafoto.php'; 
include 'script/conto.php';
include 'script/contadoc.php';
include 'script/contaeventi.php';
?>

<?php
$macs = mysql_num_rows(mysql_query("SELECT * FROM acquisti WHERE utente = '$id'"));
$conto22 = "(&#128; ".$conto.")"; 
$root = $sites."utenti/".$id."/profile.jpg?".time();
echo '<li><a href="'.$sites.'user.php?ID='.$id.'"><img class="imgbarraprofilo" height="24" width="21" src="'.$root.'"/><b><span class="utente">'.$_SESSION['utente'].'</span></b></a><ul>
<li><a href="'.$sites.'areaprofilo.php">Profilo</a></li>
<li><a href="'.$sites.'areaamici.php">Amici';
if($amiciNUM > 0) echo ' ('.$amiciNUM.')';
echo '</a></li>
<li><a href="'.$sites.'areaeventi.php">Calendario';
if($eventi > 0) echo ' ('.$eventi.')';
echo '</a></li>
<li><a href="'.$sites.'areamessaggi.php">Messaggi';
if($Nmsg > 0) echo ' ('.$Nmsg.')';
echo '</a></li>
<li><a href="'.$sites.'areagalleria.php">Galleria';
if($fotoes > 0) echo ' ('.$fotoes.')';
echo '</a></li>
<li><a href="'.$sites.'arealibreria.php">Libreria';
if($macs > 0) echo ' ('.$macs.')';
echo '</a></li>
<li><a href="'.$sites.'resoconto.php">Resoconto '.$conto22.'</a></li>
<li><a href="'.$sites.'impostazioni.php"><img class="imgbarraprofilo" height="25" width="25"src="'.$sites.'images/impost.png"/><span class="utente">Impostazioni</span></a></li>
</ul></li><li><a href="'.$sites.'logout.php">Esci</a></li>';
}else{
echo "<li><b><a href='".$sites."index.php?ref=1'>Registrati</a></b></li>";
echo "<li><b><a href='".$sites."index.php'>Accedi</a></b></li>";
}
echo '</div></ul>'; ?>