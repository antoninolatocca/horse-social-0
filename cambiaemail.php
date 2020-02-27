<?php 
include 'header.php';
?>
<div id="wrapper" style="position: absolute; top: 40px; left:30px; width:300px; height:200px;" class="backblue">
<?php
$passkey = $_GET['passkey'];
if($_GET['passkey']){
$risultatouser = mysql_query("SELECT * FROM utenti_temp WHERE codiceconferma = '$passkey'");
if($risultatouser) {
$contauser = mysql_num_rows($risultatouser);
if($contauser == 1){ $rows = mysql_fetch_array($risultatouser);
$user = $rows['nome'].' '.$rows['cognome']; $email=$rows['email']; ?>
<div class="centrata" style="margin-top:40px"><form method="post" action="#"><p><?php echo 'Ciao <b>'.$user.'</b> cambia la tua email '; ?></p><input type="email" id="testemail" name="testemail" style="width: 150px;height:18px;" /><input type="submit" id="testemail" name="testemail" style="width: 70px;height:25px;margin-left:8px" name="cambiaemail" id="cambiaemail" value="Cambia"/><br></form>
<?if(isset($_POST['cambiaemail'])){
$newemail=$_POST['testemail'];
$useremail = mysql_num_rows(mysql_query("SELECT * FROM utenti WHERE email='$newemail'"));
$useremailtemp = mysql_num_rows(mysql_query("SELECT * FROM utenti_temp WHERE email='$newemail'"));            if($useremailtemp == 0 && $useremail == 0){
$queryemail=mysql_query("UPDATE utenti_temp SET email='$newemail' WHERE email='$email'");
if($queryemail){
$to=$newemail;    $subject="Conferma Registrazione";
$header="Da: Horse Social";    $message="Ecco il tuo codice di attivazione \r\n";
$message.="Clicca sul link per confermare la registrazione \r\n";
$message.="http://hightterabyte.altervista.org/register.php?passkey=$codiceconferma";
$sentmail=mail($to,$subject,$message,$header);
if($sentmail){ echo "<p>E-mail cambiata con successo!</p>";   } else { echo "<p>Errore, E-mail non cambiata.</p>";}
} } else { echo "<p>Errore, E-mail già registrata.</p>"; }
} } } } else {?><script language="javascript">document.location.href="index.php";</script><? } ?></div></div>