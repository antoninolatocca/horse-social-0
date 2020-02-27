<? include 'header.php';include 'pannello.php';include 'text.php'; include'rindirizza.php';include'script/banner/destra.html'?>
<div id="impostazionidiv" style="position:absolute;top:200px;left:300px;">
<h1 style="color:white;font-size: 40px;">Impostazioni account</h1></div>
<div style="position:absolute;top:240px;left:750px;"><form method="post"><button class="buttonareaprofilo" name="invia" id="invia">Salva modifiche</button></div>
<div style="position:absolute;top:300px;left:200px;">
<h1 style="color:white;font-size: 30px;">Generali</h1>
<? $QQQ = mysql_query("SELECT * FROM utenti WHERE id = '$id'");
while($row = mysql_fetch_array($QQQ)){
$BG = $row['bkcolor'];
$LG = $row['flag'];
$GY = $row['vis_gallery'];
$VD = $row['vis_data'];
$CY = $row['vis_cell'];
$VS = $row['vis_state'];
$VAL = $row['val'];}?>
<table><tr><td><label for="nome">Lingua:</label></td><td>
<select name="lingua" id="lingua"  style="width: 212px"><?
echo '<option value="'.$LG.'" selected>';
if($LG = 'IT') echo $LG.' - Italiano'; ?></option></select></td></tr>
<tr><td><label for="sfondo">Sfondo:</label></td><td><select name="bkcolor" id="bkcolor" style="width: 212px"><?php
// selezionato
echo '<option value="'.$BG.'" selected>';
if($BG == '#622100'){
$BGC = "Marrone (default)";
}elseif($BG == '#000000'){
$BGC = "Nero";
}elseif($BG == '#033922'){
$BGC = "Verdone";
}elseif($BG == '#800000'){
$BGC = "Rubino";
}echo $BGC;

if($BGC == "Nero"){
$ABGC = "Marrone (default)";
$BCD = "#622100";
$ABGC1 = "Verdone";
$BCD1 = "#033922";
$ABGC2 = "Rubino";
$BCD2 = "#800000";
}elseif($BGC == "Marrone (default)"){
$ABGC = "Nero";
$BCD = "#000000";
$ABGC1 = "Verdone";
$BCD1 = "#033922";
$ABGC2 = "Rubino";
$BCD2 = "#800000";
}elseif($BGC == "Verdone"){
$ABGC = "Marrone (default)";
$BCD = "#622100";
$ABGC1 = "Nero";
$BCD1 = "#000000";
$ABGC2 = "Rubino";
$BCD2 = "#800000";
}elseif($BGC == "Rubino"){
$ABGC = "Marrone (default)";
$BCD = "#622100";
$ABGC1 = "Nero";
$BCD1 = "#000000";
$ABGC2 = "Verdone";
$BCD2 = "#033922";
} echo '</option>
<option value="'.$BCD.'">'.$ABGC.'</option>
<option value="'.$BCD1.'">'.$ABGC1.'</option>
<option value="'.$BCD2.'">'.$ABGC2.'</option>
</select></td></tr>
<tr><td><label for="valuta">Valuta:</label></td><td>
<select name="valuta"  id="valuta" style="width: 212px">
<option value="'.$VAL.'" selected>';
if($VAL == 'EUR') echo '&#8364 - Euro'; ?>
</option></select></td></tr></table><!--<h1 style="color:white;font-size: 30px;">E-mail</h1>
<table><tr><td><label for="newsletters" >Newsletters</label><td><input type="checkbox" name="newsletters" value="Newsletters" <?php echo $BLC; ?>/></td></td></tr>
<tr><td><label for="messaggi" >Messaggi</label><td>
<input type="checkbox" name="messaggi" value="Messaggi" <?php echo $SCC; ?>/></td></td></tr>
<tr><td><label for="richieste" >Richieste di amicizia</label><td>
<input type="checkbox" name="richieste" value="richieste" <?php echo $SCC; ?>/></td></td></tr></table>--!>
</div>
<? if($GY == 1) $GYC = "checked=\"checked\""; else $GYC=NULL;
if($VD == 1) $VDC = "checked=\"checked\""; else $VDC=NULL;
if($CY == 1) $CYC = "checked=\"checked\""; else $CYC=NULL;
if($VS == 1) $VSC = "checked=\"checked\""; else $VSC=NULL;?>
<div style="position:absolute;top:300px;left:600px;"><h1 style="color:white;font-size: 30px;">Pagina pubblica</h1>
<table><tr><td><label for="galleria" >Galleria</label><td><input type="checkbox" name="galleria" id="galleria" value="galleria" <?php echo $GYC; ?>/></td></td></tr>
<tr><td><label for="data_nascita" >Data di nascita</label><td>
<input type="checkbox" name="data_nascita" id="data_nascita" value="data_nascita" <?php echo $VDC; ?>/></td></td></tr>
<tr><td><label for="cell" >Cellulare</label><td><input type="checkbox" name="cell" id="cell" value="Cellulare" <?php echo $CYC; ?>/></td></td></tr>
<tr><td><label for="stato" >Stato civile</label><td><input type="checkbox" name="stato" id="stato" value="Stato civile" <?php echo $CYC; ?>/></td></td></tr>
</table></div></form>
<?php if(isset($_POST['invia'])){ 
$Language= $_POST['lingua'];
$color = $_POST['bkcolor'];
$VAL= $_POST['valuta'];
if(isset($_POST['galleria']))
$Gallery=1; else $Gallery=0;
if(isset($_POST['data_nascita']))
$Data_nascita=1; else $Data_nascita=0;
if(isset($_POST['cell']))
$Cellulare=1; else $Celleulare=0;
if(isset($_POST['stato']))
$Stato=1; else $Stato=0;
$update=mysql_query("UPDATE utenti SET val='$VAL',flag='$Language',bkcolor='$color', vis_data='$Data_nascita', vis_gallery='$Gallery', vis_cell='$Cellulare', vis_state='$Stato' WHERE id='$id'");
?><script language="javascript">document.location.href="impostazioni.php";</script><?php }?>