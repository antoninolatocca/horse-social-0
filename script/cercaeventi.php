<? $datenow = date("Y-m-d");

// compleanni
$Q_birt = mysql_query("SELECT * FROM utenti WHERE data_nascita = '$datenow'");
while($ayy=mysql_fetch_array($Q_birt)){
 if($ayy[7] == $datenow){
  echo '<table><tr><td width="60"><img src="https://fbstatic-a.akamaihd.net/rsrc.php/v2/yx/r/9oOQrKSw-BC.png" height="50"></td><td><p class="status"><b><a href="'.$sites.'user.php?ID='.$ayy[0].'">'.$ayy[2].' '.$ayy[3].'</a></b></td></tr></table>';
 }
}

// eventi
$Q_event = mysql_query("SELECT * FROM eventi WHERE data >= '$datenow' OR data_fine >= '$datenow' ORDER BY data");
if(mysql_num_rows($Q_event) > 0){
 echo '<fieldset style="width:100%;height:190px"><legend align="center" style="color:#FFf">Eventi in programma</legend><div style="overflow:auto;"><div class="eventiscroll">';
 while($ay=mysql_fetch_array($Q_event)){
  $eveID = $ay['id'];
  $press = $ay['luogo'];
  $pos = strpos($press, "-");
  $nSBS = substr($press, 0, $pos - 1);
  $Q_mng = mysql_query("SELECT * FROM maneggi WHERE nome = '$nSBS'");
  if($ri = mysql_num_rows($Q_mng) == 1){
   $arr_MNG = mysql_fetch_array($Q_mng);
   $mngg_ID = $arr_MNG['id'];
   $press = '<a href="'.$sites.'maneggio.php?ID='.$mngg_ID.'&P=1">'.$press.'</a>';
  }
  $Q_ie = mysql_query("SELECT * FROM ieventi WHERE (utente = '$id' AND evento = '$eveID')");
  echo '<table><tr><td width="60"><img src="'.$sites.'images/calendario2.png" height="50"></td><td><!--<div itemscope itemype="http://data-vocabulary.org/Event">-->';
  echo '<p class="status">';
  if($ay['link'] != NULL) echo '<a href="'.$ay['link'].'">'; 
  echo'<b><!--<span itemprop="summary">-->'.$ay['titolo'].'<!--</span>--></b></a>';
  echo'<br><!--<span class="eventdescription"><span itemprop="description">-->'.$ay['descrizione'].'<!--</span></span>--><br><i>'.$press.'</i><br>';
  if($ay[data_fine]) echo 'Dal ';
  echo '<b><!--<span itemprop="startDate" datetime="'.$ay[data].'">-->'.$ay[data].'<!--</time>--></b>';
  if($ay[data_fine]) echo ' al <b><!--<time itemprop="endDate" datetime="'.$ay[data_fine].'">-->'.$ay[data_fine].'<!--</time>--></b>';
  echo '</p></td><td width="10%">';
  if($NNN = mysql_num_rows($Q_ie) > 0){
   $asY = mysql_fetch_array($Q_ie);
   $acpt = $asY['adesione'];
   if($acpt == 'senza risposta' || $acpt == 'partecipa'){
    $valo = 'Rifiuta';
    $action = 'rifiuta';
   }elseif($acpt == 'rifiuta'){
    $valo = 'Partecipa';
    $action = 'accetta';
   }
  }else{
   $valo = 'Partecipa';
   $action = 'accetta';
  }
  echo '<a href="areaeventi.php?'.$action.'='.$eveID.'"><input type="button" value="'.$valo.'" class="defaultbutton" style="width:100%"/></a></td></tr></table>';
 }
 echo '</div></div></fieldset><br>';
}

// Elimina eventi
$RE_idevent = mysql_query("SELECT * FROM eventi WHERE data_fine < '$datenow'");
if(mysql_num_rows($RE_idevent) > 0){
 while($arr_ev=mysql_fetch_array($RE_idevent)){
  $iddevento = $arr_ev[0];
  $DE_ieventi = mysql_query("DELETE FROM ieventi WHERE evento = '$iddevento'");
  $DE_eventi = mysql_query("DELETE FROM eventi WHERE id = '$iddevento'");
 }
 
 // Aggiorna autoincrement
 $Count = mysql_query("SELECT * FROM eventi");
 if($ccc = mysql_num_rows($Count) > 0){
  $ccc++;
  $upd_alt = mysql_query("ALTER TABLE eventi AUTO_INCREMENT = '$ccc'");
 }
}
?>