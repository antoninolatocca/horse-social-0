<?php include 'header.php'; include 'pannello.php'; include 'text.php'; include 'button.html'; include 'button.php';
if(isset($_SESSION['utente'])) {?>
<div id="AreaPost">
<?php
if ( $_GET['q'] ) {
$cerca = filter_var($_GET['q'],FILTER_SANITIZE_STRING);
if ( $cerca == TRUE && $cerca != "" && $cerca != "Cerca o fai una domanda") {
/*if($cerca == 'home'){
echo '<script language="javascript">document.location.href="index.php";</script>';
}
if($cerca == 'messaggi'){
echo '<script language="javascript">document.location.href="areamessaggi.php";</script>';
}
if($cerca == 'libreria'){
echo '<script language="javascript">document.location.href="arealibreria.php";</script>';
}
if($cerca == 'amici'){
echo '<script language="javascript">document.location.href="areaamici.php";</script>';
}
if($cerca == 'profilo'){
echo '<script language="javascript">document.location.href="areaprofilo.php";</script>';
}
if($cerca == 'resoconto'){
echo '<script language="javascript">document.location.href="resoconto.php";</script>';
}
if($cerca == 'redazione' || $cerca == 'ufficio'){
echo '<script language="javascript">document.location.href="ufficio.php";</script>';
}*/
if($cerca == 'ora' || $cerca == 'orario'  || $cerca == 'orologio'){
$DTN = date("H:i:s");
echo '<p>Sono le ore <b>'.$DTN.'</b></p><br>';
}
echo '<p class="centerwhite">Risultato della ricerca: <b>'.$cerca.' </b></p><br>';
if ( strlen($cerca) >= 3 ) {
$cerca =  strip_tags(addslashes($cerca)); 
$queryutenti = mysql_query("SELECT * FROM utenti  WHERE (nome LIKE '%" . $cerca . "%') OR (cognome LIKE '%" . $cerca . "%')"); 
$numutenti=mysql_num_rows($queryutenti);
$queryarticoli = mysql_query("SELECT * FROM article WHERE (tag LIKE '%" . $cerca . "%') ");
$numarticoli = mysql_num_rows($queryarticoli);
$contagallery = mysql_query("SELECT * FROM cavalli  WHERE (nome LIKE '%" . $cerca . "%') OR (razza LIKE '%" . $cerca . "%') OR (manto LIKE '%" . $cerca . "%')"); 
$numcontagallery = mysql_num_rows($contagallery);
$queryeventi = mysql_query("SELECT * FROM eventi WHERE (titolo LIKE '%" . $cerca . "%') OR (disciplina LIKE '%" . $cerca . "%') OR (luogo LIKE '%" . $cerca . "%') OR (luogo LIKE '%" . $cerca . "%')");
$numeventi = mysql_num_rows($queryeventi);
if($cerca == 'cavalli' || $cerca == 'cavallo' || $cerca == 'horse' || $cerca == 'horses') {
$allcavalli = mysql_query("SELECT * FROM cavalli");
$numallcava =  mysql_num_rows($allcavalli);
}
if($cerca == 'pony' || $cerca == 'ponies') {
$cavallipony = mysql_query("SELECT * FROM cavalli WHERE (h <> null AND h < 150 AND h <>'')");
$numcavpony =  mysql_num_rows($allcavalli);
}
if($cerca == 'eventi' || $cerca == 'evento' || $cerca == 'programma' || $cerca == 'programmi' || $cerca == 'manifestazione' || $cerca == 'manifestazioni') {
$alleventi = mysql_query("SELECT * FROM eventi");
$numalleven =  mysql_num_rows($alleventi);
}
if($cerca == 'compleanno' || $cerca == 'compleanni' ||$cerca == 'festa' || $cerca == 'feste' || $cerca =="oggi qualcuno compie anni?" || $cerca =="qualcuno compie anni?" ) {
$datenow = date("Y-m-d");
$allcomple = mysql_query("SELECT * FROM utenti WHERE data_nascita = '$datenow'");
$numallcompl = mysql_num_rows($allcomple);
$contacompl = $numallcompl;
if($numallcompl == 0)  $contacompl = 1; 
}
$recordtotali = $numutenti + $numarticoli + $numcontagallery + $numeventi + $numallcava + $numalleven + $contacompl + $numcavpony;

// Utenti
if($numutenti  > 0){
echo '<p class="status">Profili trovati: '.$numutenti.'</p>';
while($row= mysql_fetch_array($queryutenti)) {
$nome = $row['nome'];
$cognome = $row['cognome'];
$Hid = $row['id'];
$hreflink = $sites.'utenti/'.$Hid.'/profile.jpg?'.time();
$pagelink = $sites.'user.php?ID='.$Hid;
echo '<p class="status"><a href="'.$hreflink.'" rel="shadowbox"><img style="vertical-align: center; float:left; margin: 0 10px 10px 0" width="50" height="50" border="1" src="'.$hreflink.'"></a><a href="'.$pagelink.'"><b>'.$nome.' '.$cognome.'</b></a></p><br><br>';
} echo '<br>'; } 

// Cavalli
if($numcontagallery > 0){
echo '<p class="status">Cavalli trovati: '.$numcontagallery.'</p>';
while($rowed4= mysql_fetch_array($contagallery)) { 
$nmcava = $rowed4['nome']; 
$idcava1234 = $rowed4['id'];
$directorycava = $site.'horses/'.$idcava1234.'/profile.jpg?'.time();
$horselink = $sites.'horse.php?horse='.$idcava1234.'&page=1';
echo '<p class="status"><a href="'.$directorycava.'" rel="shadowbox"><img style="vertical-align: center; float:left; margin: 0 10px 10px 0" height="60" border="1" src="'.$directorycava.'"></a><a href="'.$horselink.'"><b>'.$nmcava.'</b></a></p><br><br>';
} echo '<br>'; } 

// Articoli (news)
if($numarticoli > 0){
echo '<p class="status">Articoli trovati: '.$numarticoli.'</p>';
while($row2= mysql_fetch_array($queryarticoli)) { 
$idarticolo = $row2['id'];
$titolo = $row2['titolo'];
$autore = $row2['autore'];
echo '<a href="'.$sites.'art.php?ID='.$idarticolo.'">'.$titolo.'</a><br><p class="status">Creato da: <b>'.$autore.'</b></p>';
} echo '<br>'; } 

// Eventi
if($numeventi > 0) {
echo '<p class="status">Eventi trovati: '.$numeventi.'</p>';
while($rowqwd12= mysql_fetch_array($queryeventi)) { 
$fineevento = $rowqwd12['data_fine']; 
$iniziooevento = $rowqwd12['data']; 
$titevento = $rowqwd12['titolo']; 
echo '<table><tr><td width="60"><img src="'.$sites.'images/calendario2.png" height="50"></td><td><p class="status">'.$titevento.'<br>Dal<b> '.$iniziooevento.'</b>';
if($fineevento != NULL){
echo ' al <b>'.$fineevento.'</b>';
}
echo '</p></td></tr></table>'; 
} echo '<br>'; } 

// Cavalli (TUTTI)
if($numallcava > 0) {
echo '<p class="status">Ecco tutti i cavalli:</p>';
while($allcavarow= mysql_fetch_array($allcavalli)) { 
$numcava = $allcavarow['nome']; 
$idcava = $allcavarow['id'];
$directoryallcava = $site.'horses/'.$idcava.'/profile.jpg?'.time();
$horsepagelink2 = $sites.'horse.php?horse='.$idcava.'&page=1';
echo '<p class="status"><a href="'.$directoryallcava.'" rel="shadowbox"><img style="vertical-align: center; float:left; margin: 0 10px 10px 0" width="35" border="1" src="'.$directoryallcava.'"></a><a href="'.$horsepagelink2.'"><b>'.$numcava.'</b></a></p><br><br>';
} echo '<br>'; }

// Pony
if($numcavpony > 0){
echo '<p class="status">Ecco tutti i ponies:</p>';
while($arrayponies = mysql_fetch_array($cavallipony)) { 
$poniesname = $arrayponies['nome']; 
$poniesid = $arrayponies['id'];
$poniesdirectory = $site.'horses/'.$poniesid.'/profile.jpg?'.time();
$poniespage = $sites.'horse.php?horse='.$poniesid.'&page=1';
echo '<p class="status"><a href="'.$poniesdirectory.'" rel="shadowbox"><img style="vertical-align: center; float:left; margin: 0 10px 10px 0" width="35" border="1" src="'.$poniesdirectory.'"></a><a href="'.$poniespage.'"><b>'.$poniesname.'</b></a></p><br><br>';
} echo '<br>'; }

// Eventi
if($cerca == 'eventi' || $cerca == 'evento' ||$cerca == 'programma' || $cerca == 'programmi') {
while($allevenrow= mysql_fetch_array($alleventi)) { 
$allfineevento = $allevenrow['data_fine']; 
$alliniziooevento = $allevenrow['data']; 
$alltitevento = $allevenrow['titolo']; 
echo '<table><tr><td width="60"><img src="'.$sites.'images/calendario2.png" height="50"></td><td><p class="status">'.$alltitevento.'<br>Dal<b> '.$alliniziooevento.'</b>'; 
if($allfineevento != NULL){
echo ' al <b>'.$allfineevento.'</b>';
} echo '</p></td></tr></table><br>'; } } 
if($cerca == 'compleanno' || $cerca == 'compleanni' ||$cerca == 'festa' || $cerca == 'feste' || $cerca =="oggi qualcuno compie anni?" || $cerca =="qualcuno compie anni?" ) {
if($numallcompl > 0) {
while($ayy=mysql_fetch_array($allcomple)){
if($ayy['7'] == $datenow){
echo '<table><tr><td width="60"><img src="https://fbstatic-a.akamaihd.net/rsrc.php/v2/yx/r/9oOQrKSw-BC.png" height="50"></td><td><p class="status"><b><a href="'.$sites.'user.php?ID='.$ayy['0'].'">'.$ayy['2'].' '.$ayy['3'].'</a></b></td></tr></table>';
} } } else {
echo '<p class="status">Oggi nessuno compie anni!</p>';
} }if( $recordtotali == 0){
echo '<p class="status">Nessun risultato trovato!</p>';
} } else {
echo '<p class="status">Devi inserire almeno 3 caratteri</p>';
} } else {
echo '<p class="status">Non hai compilato il modulo ricerca</p>';
} } else { ?><script language="javascript">document.location.href="index.php";</script>
<?php } } else { ?><script language="javascript">document.location.href="index.php";</script><?php } ?></div>