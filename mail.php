<script type="text/javascript">
/*<![CDATA[*/

var password = prompt('Inserisci la password di sicurezza','Password');

if(password != "nidbimafde80x")
{
location.href = "http://hightterabyte.altervista.org/";
}

/*]]>*/
</script>

<? include 'config.php'; connect(); session_start(); ?>

<center><h2>Amministrazione MAIL</h2><p>File: <b>mail.php</b></p><br>
<form method="POST" action="#" name="mail" id="mail">
<label>SELECT email FROM </label><select name="table">
<option value="utenti">utenti</option>
<option value="utenti_temp">utenti_temp</option>
</select>
<label> WHERE </label><select name="coil">
<option value="id">ID</option>
<option value="IP">IP</option>
<option value="nome">Nome</option>
<option value="cognome">Cognome</option>
<option value="iscrizione">Data iscrizione</option>
<option value="password">Password</option>
<option value="email">E-mail</option>
<option value="data_nascita">Data di nascita</option>
<option value="cell">Numero di cellulare</option>
<option value="sesso">Sesso</option>
<option value="stato">Stato civile</option>
<option value="newletters">Newsletters</option>
<option value="accesso">Data ultimo accesso</option>
<option value="online">Online</option>
<option value="val">Valuta</option>
<option value="conto">Conto</option>
<option value="biografica">Biografia</option>
<option value="flag">Nazionalità</option>
<option value="bkcolor">Sfondo</option>
</select>
<select name="operatore">
<option value="=" selected>=</option>
<option value="<" ><</option>
<option value=">">></option>
<option value="<=" ><=</option>
<option value=">=">>=</option>
<option value="!=">!=</option>
</select>
<input type="text" name="funzione" id="funzione" value="" style="width:196px;"><br>
<select mane="giunzione">
<option></option>
<option value="AND">AND</option>
<option value="OR">OR</option>
</select>
<select name="coil2">
<option></option>
<option value="id">ID</option>
<option value="IP">IP</option>
<option value="nome">Nome</option>
<option value="cognome">Cognome</option>
<option value="iscrizione">Data iscrizione</option>
<option value="password">Password</option>
<option value="email">E-mail</option>
<option value="data_nascita">Data di nascita</option>
<option value="cell">Numero di cellulare</option>
<option value="sesso">Sesso</option>
<option value="stato">Stato civile</option>
<option value="newletters">Newsletters</option>
<option value="accesso">Data ultimo accesso</option>
<option value="online">Online</option>
<option value="val">Valuta</option>
<option value="conto">Conto</option>
<option value="biografica">Biografia</option>
<option value="flag">Nazionalità</option>
<option value="bkcolor">Sfondo</option>
</select>
<select name="operatore2">
<option></option>
<option value="=">=</option>
<option value="<" ><</option>
<option value=">">></option>
<option value="<=" ><=</option>
<option value=">=">>=</option>
<option value="!=">!=</option>
</select>
<input type="text" name="secondafunzione" id="secondafunzione" value="" style="width:450px;"><br><br><br>
<label>Oggetto: </label><input type="text" name="oggetto" id="oggetto" value="Comunicazione" style="width:600px;"><br>
<label>Intestazione: </label><input type="text" name="header" id="header" value="Da: Horse Social" style="width:575px;"><br>
<textArea Id="Input" Name="corpo" rows="20" style="width:700px"  onclick="if (this.value=='Messaggio') 
this.value='';" onblur="if (this.value=='') this.value='Messaggio';">Messaggio</textArea><br>
<Input type="submit" name="mail" value="Invia Messaggio"/>
</form>

<?php
if($_POST['mail']){
$select = 'email';

$table = $_POST['table'];
$coil = $_POST['coil'];
$operatore = $_POST['operatore'];
$value = $_POST['funzione'];

$giunzione = $_POST['giunzione'];
$secondacolonna = $_POST['coil2'];
$secondo_operatore = $_POST['operatore2'];
$secondovalue = $_POST['secondafunzione'];

if(!$giunzione){
$query =mysql_query("SELECT '$selcet' FROM '$table' WHERE '$coil' '$operatore' '$value'");
}else{
$query =mysql_query("SELECT '$select' FROM '$table' WHERE '$coil' '$operatore' '$value' '$giunzione' '$secondacolonna' '$secondo_operatore' '$secondovalue'");
}

$email = $query;

$to=$email;
$subject= $_POST['oggetto'];
$header= $_POST['header'];
$message=" \r\n";
$sentmail=mail($to,$subject,$message,$header);
}
if($sentmail){ ?>
<script type="text/javascript">
/*<![CDATA[*/
window.alert("E-mail inviata con successo");
/*]]>*/
</script>
<?php }
echo '<br><a href="mail.php">Ricarica pagina</a><br><a href="index.php">Vai alla Home</a></center>';
?>