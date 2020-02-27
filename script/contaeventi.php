<?php
$id=$_SESSION['id'];
$eventi=0;
$datenow=date('Y-m-d');
$Q_vitati1 = mysql_query("SELECT * FROM ieventi WHERE utente = '$id' AND adesione='senza risposta' ");
if( mysql_num_rows($Q_vitati1) > 0){
while($ay123= mysql_fetch_array($Q_vitati1)){
$eventinvit = $ay123['evento'];
$statinvit = $ay123['adesione'];
$Q_eventivitati = mysql_query("SELECT * FROM eventi WHERE id = '$eventinvit' AND (data >= '$datenow' OR data_fine >= '$datenow') ");
if( mysql_num_rows($Q_eventivitati) > 0){ $eventi++; }  } }?>