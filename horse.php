<?php 
$_GET['page'] = filter_var($_GET['page'],FILTER_VALIDATE_INT); 
$_GET['horse'] = filter_var($_GET['horse'],FILTER_VALIDATE_INT); 
$_GET['preferito'] = filter_var($_GET['preferito'],FILTER_VALIDATE_INT); 
if(!empty($_GET['horse']) && !empty($_GET['page']))
{
if($_GET['horse'])
{
include 'header.php'; include 'pannello.php'; include 'text.php'; include 'rindirizza.php';
$idcavallo = $_GET['horse'];
$q1 = mysql_query("SELECT * FROM cavalli WHERE id = '$idcavallo'");
$row = mysql_fetch_array($q1);
$cavallo = $row['nome'];
$razza = strtoupper ($row['razza']);
$manto = strtoupper ($row['manto']);
$altezza = $row['h'];
$anno = $row['anno'];
$certFISE = $row['certificato FISE'];
$certFEI = $row['certificato FEI'];
$naz = strtoupper ($row['nazionalita']);
$madre = $row['madre'];
$padre = $row['padre'];
$concorsi = $row['percorsi'];
$idresidente = $row['residente'];
$PRESS = mysql_fetch_array(mysql_query("SELECT * FROM maneggi WHERE id = '$idresidente'"));
$PLACE = $PRESS['nome']." - ".$PRESS['paese']." (".$PRESS['provincia'].")";
$datae22 = date("d/m/Y H:i:s");
$sessioneid = $_SESSION['id'];
if(isset($_SESSION['utente'])){
$visita_cavallo = mysql_query("SELECT * FROM  visite_cavalli WHERE utente = '$sessioneid' AND cavallo  = '$idcavallo' AND data = '$datae22')"); 
if(!$visita_cavallo) mysql_query("INSERT INTO visite_cavalli (utente, cavallo, data) VALUES ('$sessioneid', '$idcavallo', '$datae22')"); }
include 'script/contafoto.php';
if($i22 > 0) $i22 = '('.$i22.')'; else $i22= NULL; 
echo '<div id="profile" style="position:absolute;top:250px;left:20px;width:280px;">
<a href="'.$sites.'horses/'.$idcavallo.'/profile.jpg?'.time().'" rel="shadowbox"><img src="'.$sites.'horses/'.$idcavallo.'/profile.jpg?'.time().'" width="180" style="border: solid #FFF 2px"></a><br><br>
<a href="'.$sites.'horse.php?horse='.$idcavallo.'&page=1"><input type="button" class="buttonHORSE" value="Bacheca"></a><br>
<a href="'.$sites.'horse.php?horse='.$idcavallo.'&page=2"><input type="button" class="buttonHORSE" value="Informazioni"></a><br>
<a href="'.$sites.'horse.php?horse='.$idcavallo.'&page=3"><input type="button" class="buttonHORSE" value="Galleria '.$i22.' "></a><br>
</div>';
// NOME
echo '<div id="nome" style="position:absolute;top:255px;left:275px;">
<p class="userpagename">'.$cavallo.'</p></div>';

/* PREFERITO
$checkpreferito = mysql_num_rows(mysql_query("SELECT * FROM cavalli_preferiti WHERE utente = '$id' AND cavallo = '$idcavallo'"));
echo '<div style="position:absolute;top:255px;left:700px;"><label>';
if($checkpreferito == 0) {
echo '<a href="'.$sites.'horse.php?horse='.$idcavallo.'&page=1&preferito=1">Aggiungi ai preferiti!</a>';
} else {
echo '<a href="'.$sites.'horse.php?horse='.$idcavallo.'&page=1&preferito=0">Rimuovi dai preferiti.</a>';
}
if($_GET['preferito'] == "0")
{
$checkupdate = mysql_query("DELETE FROM cavalli_preferiti WHERE utente = '$id' AND cavallo = '$idcavallo'");
}
if($_GET['preferito'] == "1"){
$checkupdate = mysql_query("INSERT INTO cavalli_preferiti (utente, cavallo) VALUES ('$id', '$idcavallo')"); 
}
echo '</label></div>';*/ 
echo'<div id="Post" style="position:absolute;top:350px;left:260px;width:60%;">';
// Informazioni
if($_GET['page'] == "2"){
if($PRESS != ""){
echo '<div style="position:absolute;left:400px;top:65px;width:400px;"><p class="centerwhite">Attualmente si trova presso<br><b>'.$PLACE.'</b></p></div>'; }
if($madre != "" || $padre != ""){
echo '<div style="width:700px;" class="centrata"><table class="centrata" style="color:#FFF;"><tr><td width="200">Madre</td><td width="200">Padre</td></tr><tr><td><b>'.$madre.'</b></td><td><b>'.$padre.'</b></td></tr></table></div>';
}else{ echo '<br><br>'; }
echo '<br><br><table style="width:300px;color:#FFF;font-size:14;font-family:Arial;">';
if($razza != ""){ echo '<tr><td>Razza</td><td>'.$razza.'</td></tr>'; }
if($manto != ""){ echo '<tr><td>Manto</td><td>'.$manto.'</td></tr>'; }
if($altezza != ""){ echo '<tr><td>Altezza</td><td>'.$altezza.'</td></tr>'; }
if($anno != ""){ echo '<tr><td>Anno</td><td>'.$anno.'</td></tr>'; }
if($naz != ""){ echo '<tr><td>Nazionalit&#224;</td><td>'.$naz.'</td></tr>'; }
if($certFISE != ""){ echo '<tr><td>Certificato FISE</td><td>'.$certFISE.'</td></tr>'; }
if($certFEI != ""){ echo '<tr><td>Certificato FEI</td><td>'.$certFEI.'</td></tr>'; }
echo '</table>';
$leggolegare = mysql_query("SELECT * FROM gare WHERE cavallo = '$cavallo'");
$numrow = mysql_num_rows($leggolegare);
if($numrow > 0){
echo '<br><br><br><table style="color:#FFF;"><tr>
<td width="80">Data</td>
<td width="50">Cat.</td>
<td width="300">Prontuario</td>
<td width="30">Pos.</td>
<td width="140">Cavaliere</td>
<td width="30">Pen.</td>
<td width="30">Pun.</td>
<td width="50">Tem.</td>
</tr></table><br>';

while($rowlegare = mysql_fetch_array($leggolegare)) {
$idevento = $rowlegare['evento'];
$data =	$rowlegare['data'];
$categoria= $rowlegare['categoria'];
$prontuario= $rowlegare['prontuario'];
$classifica= $rowlegare['posizione'];
$cavaliere=$rowlegare['cavaliere'];
$penalita= $rowlegare['pen'];
$punti= $rowlegare['punti'];
$tempo= $rowlegare['tempo'];
$querygare=  mysql_query("SELECT * FROM eventi_gare WHERE id = '$idevento' ");
while($rowgare = mysql_fetch_array($querygare)) {
echo '<table style="color:#FFF;">';
$titgara = $rowgare['evento'].' '.$rowgare['anno'].' - '.$rowgare['luogo'];
if($titgara != $net){
echo '<p class="centerwhite"><b>'.$titgara.'</b></p><tr>';
$titass = $titgara;
}
$net = $titass;
echo '<td width="80">'.$data.'</td>
<td width="50">'.$categoria.'</td>
<td width="300">'.$prontuario.'</td>
<td width="35">'.$classifica.'</td>
<td width="140">'.$cavaliere.'</td>
<td width="35">'.$penalita.'</td>
<td width="35">'.$punti.'</td>
<td width="55">'.$tempo.'</td>
</tr></table>';
} } }

// Gallery
}elseif($_GET['page'] == "3"){
$path = 'horses/'.$idcavallo.'/foto/';
$icontroll = 1;
if ($handle = opendir($path)) {
while (false !== ($file = readdir($handle))) {
if($file != '.' && $file != '..') {
$filei = $path.$file;
$DIMsize = getimagesize($filei);
echo '<div id="foto'.$icontroll.'" class="centrata"><a href="'.$path.$file.'?'.time().'" rel="shadowbox">';
if($DIMsize[0] > $DIMsize[1]){
echo '<img  alt="'.$file.'" src="'.$path.$file.'?'.time().'" title="'.$file.'" class="border" width="192" >';
} elseif($DIMsize[0] < $DIMsize[1]){
echo '<img  alt="'.$file.'" src="'.$path.$file.'?'.time().'" title="'.$file.'" class="border" height="192"></a>';
} elseif($DIMsize[0] == $DIMsize[1]){
echo '<img  alt="'.$file.'" src="'.$path.$file.'?'.time().'" title="'.$file.'" class="border" height="192" width="192">';
}
echo '</a></div>';
$icontroll++;
} }  }
if($icontroll == 1) echo '<p class="centerwhite">Nessuna foto caricata.</p>';

// Bacheca
}elseif($_GET['page'] == "1"){
$label = "Stato:"; $textareastate = "Scrivi sulla bacheca di ".$cavallo; ?>
<form method="post"  id="messaggio"><?	
echo '<textarea  name="message" id="message" class="postareatxt"
onclick="if (this.value==\''.$textareastate.'\') this.value=\'\';"
onblur="if (this.value==\'\') this.value=\''.$textareastate.'\';"
type="text" value="'.$textareastate.'">'.$textareastate.'</textarea><br>
<div class="centrata"><input type="submit" name="pubblica" style="width:260px;height:23px;" class="defaultbutton" id="pubblica" value="Pubblica" /></div><br>              
</form>';
if($_POST['message'] != "" AND $_POST['message'] != $textareastate){
  $contenuto = $_POST['message'];
  $data = date("H:i:s d/m/y");
  $qpost = mysql_query("INSERT INTO post (utente,data,post,tag) VALUES ('$id','$data','$contenuto','$idcavallo')");
  if($qpost == TRUE) { 
  echo '<script language="javascript">
  document.location.href="'.$sites.'horse.php?horse='.$idcavallo.'&page=1";
  </script>';
  } } 
  $postscavallo = mysql_query("SELECT * FROM  post WHERE tag = '$idcavallo' ORDER BY id DESC");
  while($rpsw=mysql_fetch_array($postscavallo)){
  $utenteidpost = $rpsw['utente'];
  $tagpost= $rpsw['tag'];
  $contenutopost = htmlspecialchars($rpsw['post']);
  $datapost = $rpsw['data'];
  $utentepost = mysql_query("SELECT * FROM utenti WHERE  id='$utenteidpost'");
  while($row2=mysql_fetch_array($utentepost)){
  $ncpost = $row2['nome'].' '.$row2['cognome'];
  }  
  echo '<div id="postnarea"><br>'; 
  echo '<p class="status"><a href="'.$sites.'utenti/'.$utenteidpost.'/profile.jpg?'.time().'" rel="shadowbox"><img style="vertical-align: top; float: left; margin: 0 15px 50px 0" width="50" height="50" border="1" src="'.$sites.'utenti/'.$utenteidpost.'/profile.jpg?'.time().'"></a><label class="status"><b><a href="'.$sites.'user.php?ID='.$utenteidpost.'">'.$ncpost.'</a></b></label>'.$contenutopost;
  echo '<br>';
  echo '<b>'.$datapost.'</b></p></div><br>';} } ?></div>
<? }else {?><script language="javascript">document.location.href="http://hightterabyte.altervista.org/index.php";</script>
<? } } else { ?><script language="javascript">document.location.href="http://hightterabyte.altervista.org/index.php";</script><? }
include 'script/banner/destra.html'; ?>