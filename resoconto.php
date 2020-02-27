<?php 
include'header.php';
include'pannello.php';
include'button.php';
echo '<div id="estrattoconto">';
$resi = mysql_query("SELECT * FROM reso WHERE  utente='$id' ORDER BY data");
if (mysql_num_rows($resi) > 0) { ?>
<table border="2">
<tr>
<td width="450px">
<p class="centerwhite"><b>Movimento</b></p>
</td>
<td width="100px">
<p class="centerwhite"><b>Tipologia</b></p>
</td>
<td width="100px">
<p class="centerwhite"><b>Stato</b></p>
</td>
<td width="200px">
<p class="centerwhite"><b>Data</b></p>
</td>
<td width="150px">
<p class="centerwhite"><b>Valore</b></p>
</td>
</tr>
<?php 
while($row=mysql_fetch_array($resi)){
$valoriformat = number_format($row[valore], 2, ',', ' ');
                echo" <tr>";
                echo" <td><p style='color:#FFF'>".$row['transazione']."</p></td>";
                echo" <td width='100px'><p class='centerwhite'>".$row['tipo']."</p></td>";
                echo "<td><p class='centerwhite'>".$row['stato']."</p></td>";
                echo "<td><p class='centerwhite'>".$row['data']."</p></td>";
                echo "<td><p class='centerwhite'>&#8364 ".$valoriformat."</p></td>";
                echo "</tr>";
                }
?>
<!--TOTALE-->
<tr>
<td width="350px" align="left">
<p class="centerwhite"><b>TOTALE</b></p>
</td>
<td width="100px">
</td>
<td width="100px">
</td>
<td width="200px">
</td>
<td width="100px">
<?php 
include 'script/conto.php';
echo '<p class="centerwhite"><b>'.$currency.' '.$conto.'</b></p>'; ?>
</td>
</tr>
</table>
<? } else { ?>
<table border="3"><tr><td width="900px">
<p class="centerwhite">Non hai effettuato alcuna transizione di denaro, inizia subito a guadagnare (<a href="info.php">scopri di più</a>), oppure effettua un acquisto (<a href="store.php">Vai allo store</a>)</p>
</td></tr></table>
<?php } ?>
<br><br><br>
<!--<div id="Ricarica"><?php
if(isset($_POST['invia']) AND $_POST['email'] == $_SESSION['email'] AND number_format($_POST['importo']) > 0 ){ 
if(number_format($_POST['importo']) < 100){
$costi = "1,00";
}elseif(number_format($_POST['importo']) >= 100){
$costi = "0,00";
}else{
$error = "TRUE";
}
$totale = number_format($_POST['importo']) + number_format($costi);
if($error == "TRUE"){
echo '<p class="centerwhite">Siamo spiacenti, si è verificato un errore, la richiesta non può essere inviata. Controlla che i valori inseriti siano validi, o contatta gli sviluppatori.</p>';
}else{ ?><h4 style="color:#FFF">Riepilogo</h4>
<table><tr><td><label>Importo:</label></td><td class="centrata"><label for="importo">&#x80;<b><?php echo $_POST['importo']; ?></b></label></td></tr><tr><td><label>Costi per la ricarica: </label></td><td class="centrata"><label for='costi'>&#x80; <? echo $costi; ?></label></td></tr><tr><td><label>Totale: </label></td><td class="centrata"><label for="totale">&#x80; <? echo $totale; ?></label></td></tr><tr><td width="600"><input type="checkbox" name="accetto" value="accetto"><font color="white">Sono consapevole che riceverò una e-mail all'indirizzo da me indicato, con una richiesta di pagamento pari all'importo da me indicato, con aggiunta delle eventuali spese. Sono consapevole che la mia richiesta verrà convalidata da un responsabile appena possibile. Inoltre accetto che la ricarica del mio conto Horse Social venga effettuata solo al momento dell'effettivo ricevimento del denaro.</font><br>
</td></tr><tr><td><button type="submit" name="fine" id="fine"  style="width:212px" >Concludi</button></td></tr></table>
<? }}else{ ?>
<fieldset><legend style="color: #FFFFFF;">Ricarica il tuo conto Horse Social</legend>
<table><form method="post" action="#" id="formlogin"><tr><td><label for="email">E-mail: </label></td><td><input type="text" name="email" id="email" value="<? echo $_SESSION['email']; ?>"></td></tr><tr><td><label for="importo">Importo: </label></td><td><input type="text" name="importo" id="importo" value="0"></td></tr><tr><td><label for="valuta">Valuta: </label></td><td><select name="valuta"  style="width: 212px"><option value="Euro" selected>Euro [&#x80]</option></select></td></tr><tr><td></td><td><br><button type="submit" name="invia" id="invia"  style="width:212px" >Procedi</button></td></tr></form></table><div style="position: absolute; left: 500px;">
<? } ?></div>--!>

<center>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="4J8BBMW6FWDLW">
<table>
<tr><td><select name="os0" style="width:200px">
	<option value="5 euro">5 euro &#8364;5,00 EUR</option>
	<option value="10 euro">10 euro &#8364;10,00 EUR</option>
	<option value="20 euro">20 euro &#8364;20,00 EUR</option>
	<option value="25 euro">25 euro &#8364;25,00 EUR</option>
	<option value="50 euro">50 euro &#8364;50,00 EUR</option>
</select> </td></tr>
<tr><td><input type="hidden" name="currency_code" value="EUR"></td></tr>
<tr><td><input type="submit" name="submit"  style="width:200px;" class="defaultbutton" value="Ricarica"></td></tr></table>
<img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
</form>
</center>
</div>