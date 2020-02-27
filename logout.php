<?php
include 'header.php';
include 'script/banner/destra.html';
if(!isset($_SESSION['utente'])) { ?><script language="javascript">document.location.href="index.php";</script><?php } else { 
echo '<br><p>Logout in corso! Attendere...</p>';
$id = $_SESSION['id'];
$datenow = date("Y-m-d H:i:s");
$LOGOUTupdate = mysql_query("UPDATE sessioni SET logout='$datenow' WHERE utente='$id'"); 
session_destroy(); ?><script language="javascript">document.location.href="index.php";</script><? exit(); } ?>