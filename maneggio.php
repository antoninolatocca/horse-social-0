<?php 
$_GET[ID] = filter_var($_GET[ID],FILTER_VALIDATE_INT);
$_GET[P] = filter_var($_GET[P],FILTER_VALIDATE_INT); 

if(!empty($_GET)){
if($_GET[ID]){
$center = $_GET[ID];
$QU = mysql_fetch_array(mysql_query("SELECT * FROM maneggi WHERE id = '$center'"));
$place = $QU[nome].' - '.$QU[paese].' ('.$QU[provincia].')';
include 'header.php';include 'button_center.php';include 'pannello.php'; include 'text.php';
if($_GET[P]){
$page = $_GET[P];
// P=1 : HOME
if($page == 1){
include 'maneggi/'.$center.'/home.php';
}elseif($page == 2){
// P=2 : HORSES-GALLERY
include 'gallery.php';
}elseif($page == 3){
// P=3 : CONTATTI
include 'maneggi/'.$center.'/contatti.php';
}else{
echo '<script language="javascript">document.location.href="'.$sites.'maneggio.php?ID='.$center.'&P=1";</script>';
}
}else{
echo '<script language="javascript">document.location.href="'.$sites.'maneggio.php?ID='.$center.'&P=1";</script>';
} } } ?>