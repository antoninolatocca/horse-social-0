<?php 
include 'header.php'; 
include 'pannello.php'; 
include 'button.php'; 
$datiutente = mysql_query("SELECT * FROM utenti WHERE id = '$id'"); 
while($acrft=mysql_fetch_array($datiutente)) $myemail = $acrft['email'];
$Nmsg2 = mysql_num_rows(mysql_query("SELECT * FROM messaggi WHERE id_destinatario ='$id'")); 
$Nminvsg2 =mysql_num_rows(mysql_query("SELECT * FROM messaggi WHERE id_mittente ='$id'")); 
$PiU = $_POST["PiU"]; $_GET['ref']= filter_var($_GET['ref'],FILTER_VALIDATE_INT); ?>
<div id="AreaMess" style="position:absolute;top:250px;left:200px;width:800px;">
<form method="POST">
<button type="submit" name="WRITE" style="border:1px #FFF;-webkit-border-radius:5px 5px 0px 0px;background-color:
<?php if(isset($_POST['BOZZE']) || isset($_POST['READ']) || isset($_POST['READINVI'])){
        echo '#9AFE2E;';
      }else{
        echo '#FF0000;';
}?>text-decoration:none;text-align:center;width:150px;height:30px;">Scrivi</button>
    <button type="submit" name="READ" style="border:1px #FFF;-webkit-border-radius:5px 5px 0px 0px;background-color:<?php if(isset($_POST['READ'])){echo'#FF0000;';}else{echo'#9AFE2E;';}?>text-decoration:none;text-align:center;width: 150px;height: 30px;">Posta in arrivo <? echo '('.$Nmsg2.')'; ?></button>
    <button type="submit" name="READINVI" style="border:1px #FFF;-webkit-border-radius:5px 5px 0px 0px;background-color:<?php if(isset($_POST['READINVI'])){echo'#FF0000;';}else{echo'#9AFE2E;';}?>text-decoration:none;text-align:center;width: 150px;height: 30px;">Posta inviata <? echo '('.$Nminvsg2.')'; ?></button>
    <!--<button type="submit" name="BOZZE" style="border:1px #FFF;-webkit-border-radius:5px 5px 0px 0px;background-color:<?php if(isset($_POST['BOZZE'])){echo'#FF0000;';}else{echo'#9AFE2E;';}?>text-decoration:none;text-align:center;width: 150px;height: 30px;">Bozze</button>--!>
</form>
<div style="position:absolute;top:20px;width:100%"><hr Id="Lies" Width="100%"><br>
 <?php
if(isset($_POST["READ"])){
  $q1 = mysql_query("SELECT * FROM messaggi WHERE id_destinatario = ".$id." ORDER BY `id_messaggio` DESC ");
  if(mysql_num_rows($q1) > 0){
   	echo '<table width="100%" cellpadding="10" Style="text-align:center;border-radius:5px;box-shadow:3px #AB362E;color:#FFF;"><tr><td><h4>Titolo:</h4></td><td><h4>Contenuto:</h4></td><td><h4>Da:</h4></td><td><h4>Data:</h4></td></tr>';
    while($emails = mysql_fetch_array($q1)){
      echo '<tr><td>'.$emails["titolo"].'</td><td>'.$emails["messaggio"].'</td>';
	  $q2 = mysql_query("SELECT * FROM utenti WHERE id = ".$emails[id_mittente]."");
	  While($Name = mysql_fetch_array($q2)){
	    echo '<td><a href="'.$sites.'user.php?ID='.$emails[id_mittente].'">'.$Name[email].'</a></td>';
      }
      echo '<td>'.$emails[data].'</td></tr>';
    }
    echo '</table>';
    $q3 = mysql_query("UPDATE messaggi SET letto = 1 WHERE messaggi.id_destinatario = '$id'");
    Exit();
  }else{
  	echo '<script Type="text/Javascript"><!--
    window.location ="'.$sites.'areamessaggi.php"
	//&#150;></script>';
  }
} 
if(isset($_POST['READINVI'])){
  $qinvi = mysql_query("SELECT * FROM messaggi WHERE id_mittente = '$id' ORDER BY id_messaggio DESC");
  if(mysql_num_rows($qinvi) > 0){
    while($emailsinvi = mysql_fetch_array($qinvi)){
      echo '<table width="100%" Style="text-align: center;border-radius:5px;box-shadow:3px #AB362E;color:#FFF;">
       <td width="60%" rowspan="4">'.$emailsinvi[messaggio].'</td>
       <td>'.$emailsinvi[titolo].'</td>
       <tr><td>'.$emailsinvi[data].'</td></tr>';
	  $q22 = mysql_query("SELECT * FROM utenti WHERE id = '$emailsinvi[id_destinatario]'");
  	  While($Name1 = mysql_fetch_array($q22)){
	    echo '<tr><td><a href="'.$sites.'user.php?ID='.$emailsinvi[id_destinatario].'">'.$Name1[email].'</a></td></tr></table><br>';
      }
    }   
    Exit();
  }else{
  	echo '<script Type="text/Javascript"><!--
    window.location ="'.$sites.'areamessaggi.php"
	//&#150;></script>';
  }
} 
if(isset($_GET['ref'])){ 
$idsest = $_GET['ref'];
$qx = mysql_query("SELECT * FROM utenti WHERE id = '$idsest'");
$qxemail123 = mysql_fetch_array($qx); $ref= $qxemail123[email]; } ?>
<form Action="#" method="POST" name="send"><br><br>
<? echo'<div class="centrata"><Input id="Input" type="email" Name="destinatario" value="'; if($ref){ echo $ref; }else{ echo 'Destinatario'; } echo '" style="width:40%" onclick="if (this.value==\'Destinatario\') 
this.value=\'\';" onblur="if (this.value==\'\') this.value=\'Destinatario\';"/></div><br>'; ?>
    <Input Id="Input" Type="text" Name="title"  style="width:100%" onclick="if(this.value=='Oggetto') 
this.value='';" onblur="if(this.value=='')this.value='Oggetto';" value="Oggetto"><br>
    <textArea Id="Input" Name="corpo" rows="5" style="width:100%"  onclick="if (this.value=='Messaggio') 
this.value='';" onblur="if (this.value=='') this.value='Messaggio';">Messaggio</textArea><br><br>
    <div class="centrata"><Input type="submit" style="width:200px;"class="defaultbutton" name="send" value="Invia Messaggio"/></div>
  </form><?
If(isset($_POST['send'])) {
   If($_POST['corpo'] == "" || $title = $_POST['title'] == "" || $_POST['destinatario'] == ""){
echo '<h2 Style="Color:Red">Riempire tutti i campi per Continuare</h2>';
 Exit(); Exit();}
   $id_mitt = $id;
   $id_dest = $_POST['destinatario'];
   $mess =  $_POST['corpo'];
   $title = $_POST['title'];
   $data = date("H:i:s m/d/y");
   $q1 = mysql_query("SELECT * FROM utenti WHERE email = '$id_dest'");
   $row = mysql_fetch_array($q1);
   If(mysql_num_rows($q1) == 0 || $_POST['destinatario'] == $myemail){
   echo '<h1 Style="Color:Red">L\'email <b Style="Color:Green">'.$id_dest.'</b> non è valida!</h1>';
   Exit(); }
   $id_ds = $row['id'];
   $send = mysql_query("INSERT INTO messaggi (id_mittente,id_destinatario,messaggio,Titolo ,data) VALUES ('$id_mitt','$id_ds','$mess','$title','$data');");
   If($send){
   echo '<h1 Style="Color:Blue">Il messaggio è stato inviato correttamente!</h1>';
   Exit(); 
   }else{
   echo '<h1 Style="Color:Red">Errore, messaggio non inviato!</h1>';
   }
} 
echo '</div></div>';
include 'script/banner/destra.html';
?>