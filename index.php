<?php
include 'header.php';
include 'pannello.php';
if(isset($_SESSION['utente'])){
include 'area.php';
}else{ 
include 'home.php';
}
?>


