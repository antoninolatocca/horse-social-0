<?php 
include 'header.php'; 
include 'pannello.php'; 
include 'button.php'; 
?>
<div id="areaamicidiv"><label for="amici" align="center">Amici:</label><br>
<?php $lista_amici = mysql_query("SELECT * FROM amicizie WHERE  id_amico_1='$id' OR id_amico_2='$id'");
if (mysql_num_rows($lista_amici) > 0)
 {
 while($row=mysql_fetch_array($lista_amici))
 {
 if($row['id_amico_1'] != $id){
 $idamici = $row['id_amico_1'];
 } elseif($row['id_amico_2'] != $id) 
 {
 $idamici = $row['id_amico_2'];
 } 
 $dati_amici=mysql_query("SELECT * FROM utenti WHERE id='$idamici'");
 while($amici=mysql_fetch_array($dati_amici))
  {
  $path = "utenti/".$amici['id']."/profile.jpg?".time();
  $pathdelete = "images/contenuto.png";
  echo '<p><a href="'.$path.'" rel="shadowbox"><img class="imgbarraprofilo" src="'.$path.'" heigth="30px" width="30px" /></a>
  <a href="user.php?ID='.$amici['id'].'"style="text-decoration: none">'.$amici['nome'].' '.$amici['cognome'].'</a><br><br>'; 
  }  } echo '</p>'; } else {
echo '<p>Non hai stretto amicizie</p>';
} ?></div><div id="areaamicirichiestediv"><label align="center">Richieste di amicizia:</label><br> 
<?php $richieste = mysql_query("SELECT * FROM richiesta_amicizia WHERE utente='$id'");
if (mysql_num_rows($richieste) > 0){
$richiedente = mysql_query("SELECT richiedente FROM richiesta_amicizia WHERE utente ='$id'");
while ($row = mysql_fetch_array($richiedente)) {
$utente = $row['0']; 
$ricevuta = mysql_query("SELECT nome, cognome FROM utenti  WHERE id ='$utente'");
while ($rwo2 = mysql_fetch_array($ricevuta)) {
$name = $rwo2['0']." ".$rwo2['1']; 
$path = "utenti/".$utente."/profile.jpg";
echo '<p><a href="'.$path.'" rel="shadowbox"><img class="imgbarraprofilo" src="'.$path.'" heigth="30px" width="30px"/></a><a href="user.php?ID='.$utente.'" style="text-decoration: none"> '.$name.'</a></p>
<input type="button" value="Accetta" onclick="location.href=\'areaamici.php?accetta='.$utente.'\';"/><input type="button" value="Rifiuta" onclick="location.href=\'areaamici.php?rifiuta='.$utente.'\';"
/><br><br>'; 
if(isset($_SESSION['utente'])){
$_GET['accetta'] = filter_var($_GET['accetta'],FILTER_VALIDATE_INT); 
$_GET['rifiuta'] =  filter_var($_GET['rifiuta'],FILTER_VALIDATE_INT); 
if($_GET['accetta'] == TRUE) {
$accept =  $_GET['accetta'];
$data = date("H:i:s d/m/y");
$accetta=mysql_query("INSERT INTO amicizie (id_amico_1,id_amico_2,data) VALUES ('$id','$accept','$data')");
$rifiuta = mysql_query("DELETE FROM richiesta_amicizia WHERE richiedente='$accept' AND utente = '$id' OR richiedente='$id' AND utente = '$accept'"); ?>
<script language="javascript">document.location.href="areaamici.php";</script>
<?php  } if($_GET['rifiuta'] == TRUE) {
$rifiut = $_GET['rifiuta'];
$rifiuta = mysql_query("DELETE FROM richiesta_amicizia WHERE richiedente='$rifiut' AND utente = '$id' OR richiedente='$id' AND utente = '$rifiut'"); ?>
<script language="javascript">document.location.href="areaamici.php";</script>
<?php } } } } } else {
echo "<p style='color:white;'>Non hai richieste d'amicizia</p>"; }
echo '</div>';
include 'script/banner/destra.html';
?>