<?php 
include 'header.php';
include 'pannello.php';
include 'button.php';
?>
<div style="position:absolute; left:250px; top:250px;width:55%;z-index:99;"><?php 
$_GET['month'] = filter_var($_GET['month'],FILTER_VALIDATE_INT); 
$_GET['year'] = filter_var($_GET['year'],FILTER_VALIDATE_INT); 
if($_GET['month']) {
	$month = $_GET['month'];
}
else {
	$month = date('n');
	$_GET['month'] = date('n');
}
if($_GET['year']) {
	$year = $_GET['year'];
}
else {
	$year = date('Y'); // Year
	$_GET['year'] = date('Y');
}
 
$firstday = mktime(0, 0, 0, $month, 1, $year);
$number = cal_days_in_month(CAL_GREGORIAN, $month, $year); 
$title = date('F', $firstday); 
$day = date('D', $firstday);
 
if($day == "Sun") {
	$before = "0";
}
elseif($day == "Mon") {
	$before = "1";
}
 
elseif($day == "Tue") {
	$before = "2";
}
 
elseif($day == "Wed") {
	$before = "3";
}
 
elseif($day == "Thu") {
	$before = "4";
}
 
elseif($day == "Fri") {
	$before = "5";
}
 
elseif($day == "Sat") {
	$before = "6";
}
 
if($_GET['month'] == 12) {
	$nextmonth = 1;
	$previousmonth = $_GET['month'] - 1;
	$nextyear = $_GET['year'] + 1;
	$previousyear = $_GET['year'];
}
 
elseif($_GET['month'] == 1) {
	$previousmonth = 12;
	$nextmonth = $_GET['month'] + 1;
	$previousyear = $_GET['year'] - 1;
	$nextyear = $_GET['year'];
}
 
else {
	$nextmonth = $_GET['month'] + 1;
	$previousmonth = $_GET['month'] - 1;
	$nextyear = $_GET['year'];
	$previousyear = $_GET['year'];
}
if($title == "January") {
	$title = "Gennaio";

}elseif($title == "February") {
	$title = "Febbraio";

}elseif($title == "March") {
	$title = "Marzo";

}elseif($title == "April") {
	$title = "Aprile";

}elseif($title == "May") {
	$title = "Maggio";

}elseif($title == "June") {
	$title = "Giugno";

}elseif($title == "July") {
	$title = "Luglio";

}elseif($title == "August") {
	$title = "Agosto";

}elseif($title == "September") {
	$title = "Settembre";

}elseif($title == "October") {
	$title = "Ottobre";

}elseif($title == "November") {
	$title = "Novembre";

}elseif($title == "December") {
	$title = "Dicembre";
}
echo '<table bgcolor="#000" width="100%"><tr>
<td style="float:left;background:#FF0033;"><a href="?month='.$previousmonth.'&year='.$previousyear.'">Mese precedente</a></td>
<td><h3 class="centerwhite">
&nbsp;'.$title.' '.$year.'&nbsp;
</h3></td>
<td style="float:right;background:#FF0033;"><a href="?month='.$nextmonth.'&year='.$nextyear.'">Mese successivo</a></td>
</tr></table>';

$i = 1;
$real = 1 + $before;
 $day = date('d');
echo"<table cellpadding='15' width='100%'  bgcolor='#FF0033'><tr>";
echo"<td ALIGN='center'><label>Domenica</label></td><td ALIGN='center'><label>Lunedì</label></td><td ALIGN='center'><label>Martedì</label></td><td ALIGN='center'><label>Mercoledì</label></td><td ALIGN='center'><label>Giovedì</label></td><td ALIGN='center'><label>Venerdì</label></td><td ALIGN='center'><label>Sabato</label></td></tr><tr>";
while($before > 0) {
	echo"
<td> </td>
 
";
	--$before;
}
 
while($i <= $number) {
if($i == $day && $_GET['month'] == date('n') && $_GET['year'] == date('Y')) echo '<td align="center" bgcolor="#FFA500">'.$i;
else  echo"<td align='center' onmouseover=\"this.style.background='#FFA500'\" onmouseout=\"this.style.background='#FF0033'\"> $i ";
 
	$divide = $real / 7;
	if(is_int($divide)) {
		echo"</tr>
<tr>";
	}
	++$real;
	++$i;
}

echo"</tr></table><br>";
// eventi invitato
$datenow=date('Y-m-d');
$c=0;
$Q_vitati = mysql_query("SELECT * FROM ieventi WHERE utente = '$id'");
echo '<fieldset><legend align="center" style="color:#FFF">Eventi a cui sei stato invitato</legend>';
$c=2;
if( mysql_num_rows($Q_vitati) > 0){
while($ay123= mysql_fetch_array($Q_vitati)){
$eventinvit = $ay123['evento'];
$statinvit = $ay123['adesione'];
$Q_eventivitati = mysql_query("SELECT * FROM eventi WHERE id = '$eventinvit' AND (data >= '$datenow' OR data_fine >= '$datenow') ");
while($ay=mysql_fetch_array($Q_eventivitati)){
$c++;
echo '<table><tr><td width="60"><img src="'.$sites.'images/calendario2.png" height="50"></td><td width="80%"><p class="status"><b>'.$ay['titolo'].'</b><br><font size="1" align="justify">'.$ay['descrizione'].'</font><br><i>'.$ay[luogo].'</i><br>';
if($ay[data_fine]) echo 'Dal ';
echo '<b>'.$ay[data].'</b>';
if($ay[data_fine]){
echo ' al <b>'.$ay[data_fine].'</b>';
}
echo '</p></td><td></td><td width="100%" style="text-align:right;">';
if($statinvit == 'senza risposta') {
echo '<input type="button" value="Partecipa" onclick="location.href=\'areaeventi.php?accetta='.$eventinvit.'\';" class="defaultbutton" style="width:100%"/>'; } elseif($statinvit == 'partecipa'){ 
}
if($statinvit == 'senza risposta' || $statinvit == 'partecipa') {
echo '<input type="button" value="Rifiuta" onclick="location.href=\'areaeventi.php?rifiuta='.$eventinvit.'\';" class="defaultbutton" style="width:100%"/>'; }
if($statinvit == 'rifiuta') {
echo '<input type="button" value="Partecipa" onclick="location.href=\'areaeventi.php?accetta='.$eventinvit.'\';"class="defaultbutton" style="width:100%"/></form>';
}
echo '</td></tr></table>'; } } }  
if($c == 2){
echo '<h3 class="centerwhite">Nessun evento per ora.</h3>';
}
echo '</div></fieldset><br>';
$_GET['accetta'] = filter_var($_GET['accetta'],FILTER_VALIDATE_INT); 
$_GET['rifiuta'] =  filter_var($_GET['rifiuta'],FILTER_VALIDATE_INT);
if($_GET['accetta'] == TRUE) {
$accept =  $_GET['accetta'];
$secch = mysql_query("SELECT * FROM ieventi WHERE utente='$id' AND evento='$accept'");
$SCCH = mysql_num_rows($secch);
if($SCCH){
$accetta=mysql_query("UPDATE ieventi SET adesione='partecipa' WHERE utente='$id' AND evento='$accept'"); 
}else{
$valval = 'partecipa';
$adess =mysql_query("INSERT INTO ieventi (evento, utente, adesione) VALUES ('$accept', '$id', '$valval')"); 
}
echo '<script language="javascript">document.location.href="areaeventi.php";</script>';
} if($_GET['rifiuta'] == TRUE) {
$rifiut = $_GET['rifiuta'];
$rifiuta = mysql_query("UPDATE ieventi SET adesione='rifiuta' WHERE utente='$id' AND evento='$rifiut'"); 
echo '<script language="javascript">document.location.href="areaeventi.php";</script>'; } 
echo '</div>';
include 'script/banner/destra.html';
?>