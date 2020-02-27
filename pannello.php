<?php if(isset($_SESSION['utente'])){
include 'script/contaeventi.php';
include 'script/conto.php';
echo '<div id="pannello"><div id="pannellodatiutente">';
$array = mysql_query("SELECT * FROM utenti WHERE id = '$id'");
$row = mysql_fetch_array($array);
$dbflag = $row['flag'];
$flag = "images/flag/".strtolower(trim($dbflag))."-flag.png";
$nome = $row['nome'].' '.$row['cognome'];
if($row['val'] == "EUR") $currency = '&#x80';
$richieste = mysql_num_rows(mysql_query("SELECT * FROM richiesta_amicizia WHERE utente ='$id' AND richiedente != '$id'"));
echo '<span class="utente"><a href="'.$sites.'areaprofilo.php"><b>'.$nome.'</a> </b><img height="10" width="15" src="'.$sites.$flag.'">';
echo '<br><table><tr height="20"><td bgcolor="#ff0011"><a href="'.$sites.'resoconto.php"><img height="20" src="'.$sites.'images/panel/credit.png"></a></td><td width="65" class="centrata" bgcolor="#0033FF"><a href="'.$sites.'resoconto.php" style="text-decoration: none;">'.$currency.' '.$conto.'</a></td></tr></table><br>
<table><tr class="centrata" bgcolor="#ff0011"><td>
<a href="'.$sites.'areamessaggi.php"><img height="20" src="'.$sites.'images/panel/message.gif"></a></td><td width="25">
<a href="'.$sites.'areaamici.php"><img src="'.$sites.'images/panel/friendships.png" height="25"></a></td><td width="25">
<a href="'.$sites.'areaeventi.php"><img src="'.$sites.'images/calendario2.png" height="25"></a></td>';
/* if($bauletto == 1){
echo '<td><a href="'.$sites.'areabauletto.php"><img src="'.$sites.'images/panel/bauletto_c.png" height="25"></a></td>';
} */
echo '</tr><tr class="centrata" bgcolor="#0033FF">
<td><a href="'.$sites.'areamessaggi.php" style="text-decoration: none;">'.$Nmsg.'</a></td>
<td><a href="'.$sites.'areaamici.php" style="text-decoration: none;">'.$richieste.'</a></td>
<td><a href="'.$sites.'areaeventi.php" style="text-decoration: none;">'.$eventi.'</a></td>';
if($bauletto == 1){
echo '<td><a href="'.$sites.'areabauletto.php" style="text-decoration: none;">'.$attrzzi.'</a></td>';
}
echo '</tr></table></div>
<div style="position: absolute; width: 140px; height: 140px; left: 2px; top: 40px; overflow: hidden;background-color: #000;" class="border">';
$root = $sites."utenti/".$id."/profile.jpg"."?".time();
echo '<div class="centrata"><a href="'.$sites.'areaprofilo.php"><img src="'.$root.'"/></a></div></div>'; } ?></div>