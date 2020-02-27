<?php 
include 'header.php';
include 'pannello.php';
include 'button.php'; 
include 'class/SmartImage.class.php';
?>
<div id="AreaHome" class="facciata">
<div id="Areaform" style="position: absolute; left: 250px; top: 50px">
<?php
$qdatiform=mysql_query("SELECT * FROM utenti WHERE id = '$id'");
while($rowqd=mysql_fetch_array($qdatiform))
{
$nomeform=$rowqd['nome'];
$cognomeform=$rowqd['cognome'];
$emailform=$rowqd['email'];
$cellform=$rowqd['cell'];
$biografia=$rowqd['biografia'];
$sex=$rowqd['sesso'];
$stato = $rowqd['stato'];
}
if(isset($_POST['invia'])){ 
$updatenome = $_POST['nome'];
$updatecognome = $_POST['cognome'];
$updateemail = $_POST['email'];
$updatedata_nascita = $_POST['anno'] ."/". $_POST['mese'] ."/". $_POST['giorno'];
$updatecellulare = $_POST['cell'];
if($_POST['sesso'] == "Femminile"){
$updatesesso = "f";
}elseif($_POST['sesso'] == "Maschile"){
$updatesesso = "m";
}
$updatestato = $_POST['stato'];
$result=mysql_query("UPDATE utenti SET nome='$updatenome', cognome='$updatecognome', email='$updateemail', data_nascita='$updatedata_nascita', cell='$updatecellulare', sesso='$updatesesso', stato='$updatestato' WHERE id='$id'");  ?> 
<script language="javascript">
document.location.href="areaprofilo.php";
</script>
<?php } ?>
</div></div>
<div  style="position: absolute; left: 200px; top: 220px">
<form method="post"><h1 style="color:white;font-size: 35px;">Profilo personale:</h1><br>
<table><tr><td><label for="nome">Nome:</label></td><td><label for="cognome">Cognome:</label></td></tr>
<tr><td><input type="text" name="nome" id="nome" value="<?php echo $nomeform; ?>"></td><td><input type="text" name="cognome" id="cognome" value="<?php echo $cognomeform; ?>"></td></tr>
<tr><td><label for="email">E-mail:</label></td><td><label for="cell">Cellulare:</label></td></tr>
<tr><td><input type="text" name="email" id="email" value="<?php echo $emailform; ?>"><td><input type="text" name="cell" id="cell" value="<?php echo $cellform; ?>"></td>
</tr><tr><td><label for="sesso">Sesso:</label></td><td><select name="sesso" id="sesso" style="width: 212px">
<?php if($sex == "m"){
 echo '<option value="Maschile" selected>Maschile</option><option value="Femminile">Femminile'; }elseif($sex == "f") {
 echo '<option value="Femminile" selected>Femminile</option><option value="Maschile">Maschile'; } ?>
</option></select></td></tr>
<tr><td><label for="stato">Stato:</label></td><td><select name="stato" id="stato" style="width: 212px"><?php
$arraystate = array ('single', 'fidanzato/a', 'sposato/a', 'divorziato/a', 'vedovo/a');
for($i=0;$i<5;$i++){
if($arraystate[$i] == $stato){
echo '<option value="'.$arraystate[$i].'" selected>'.ucfirst($arraystate[$i]).'</option>';
}else{
echo '<option value="'.$arraystate[$i].'">'.ucfirst($arraystate[$i]).'</option>';
} } ?></select></td></tr>
<tr><td><label>Data di nascita:</label></td><td><select name="giorno" style="width: 65px">
<?php $dataDB = mysql_query("SELECT data_nascita FROM utenti WHERE id = '$id'");
$row = mysql_fetch_array($dataDB);
$daraREAD = $row['0'];
if($daraREAD  != "0000-00-00"){
$anno = substr($daraREAD, 0, 4);
$mese = substr($daraREAD, 5, 2);
$giorno = substr($daraREAD, 8, 2);
} for($i=1;$i<32;$i++){
if($i == $giorno){ echo '<option value="'.$i.'" selected>'.$i.'</option>';}else{echo '<option value="' . $i . '">'. $i . '</option>\n';
}}echo '</select> ';echo '<select name="mese"  style="width: 60px">';for($i=1;$i<13;$i++){
if($i == $mese){echo '<option value="'.$i.'" selected>'.$i.'</option>';}else{
echo '<option value="'.$i.'">'.$i.'</option>\n';}}echo '</select> ';echo '<select name="anno"  style="width: 80px">';
$data_corrente= date("Y");for($i=1913;$i<$data_corrente;$i++){if($i == $anno){
echo '<option value="'.$i.'" selected>'.$i.'</option>';}else{
echo '<option value="'.$i.'">'.$i.'</option>\n';}} ?></td></tr></table>
<br><div class="centrata"><button type="submit" class="buttonareaprofilo" name="invia" id="login">Invia le modifiche</button>
</form></div><br><form method="POST"><label>Scrivi qualcosa su di te: <i>(Massimo 500 caratteri)</i></label>
<textarea name="biografia"  style="width: 435px; height: 100px;margin-top:5px"><?php echo $biografia; ?></textarea><br><center><input type="submit" name="aggiorna" style="width:163px;height: 35px;margin-top:15px" class="defaultbutton" value="Aggiorna" /></center>
</form>
<?php if($_POST['aggiorna']){
$testo = str_replace("'","\\'",$_POST['biografia']);
if(strlen($testo) < 500){
$UPDbio=mysql_query("UPDATE utenti SET biografia ='$testo' WHERE id='$id'");
if($UPDbio){
echo '<script language="javascript">document.location.href="areaprofilo.php";</script>';
}else echo '<script language="javascript">alert("Errore: '.mysql_error().'")</script>';
}else{ 
echo '<script language="javascript">alert("Il testo non deve superare i 500 caratteri!")</script>';
}} ?></div><div id="infoprofile">
<!-- Condivisione profilo -->
<!--<div class="centrata"><label>Condividi il tuo profilo su Facebook</label>
<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.hightterabyte.altervista.org%2Fuser.php?ID=<?php echo $_SESSION['id']; ?>"><img height="30" src="http://hightterabyte.altervista.org/images/share.png"></a><br><br><br>-->

<!-- Profilo immagine -->
<div class="centrata"><label>Cambia immagine:</label><br><form action="#" method="post" enctype="multipart/form-data"><?php 
$root = $sites."utenti/".$id."/profile.jpg"."?".time();
echo '<div class="centrata"><a href="'.$root.'" rel="shadowbox"><img style="border:2px solid #000;" src="'.$root.'" onmouseover="this.style.border=\'2px solid #00BB37\'" onmouseout="this.style.border=\'2px solid #000\'"/></a></div>'; ?><br>
<input name="foto" type="file"  />
<br><input name="upload" type="submit" style="width:120px;margin-top:5px;" class="defaultbutton" value="Carica immagine" /></form><?php
if(isset($_POST['upload'])) {
$old_name = "utenti/".$id."/profile.jpg";
        $Ifoto = 0;
        $path = "utenti/".$id."/immagini/profilo/";
        if ($handle = opendir($path)) {
        $files = "jpg";
        while (false !== ($file = readdir($handle))) {
          if($file != '.' && $file != '..') $Ifoto++;
        }
      }
        $Ifoto++;
        $new_name = "utenti/".$id."/immagini/profilo/profile_".$Ifoto.".jpg";
        if(rename($old_name, $new_name) == TRUE){
        $file = $_FILES["foto"];
        if($file["name"] != ""){
        if($file["error"] == 0){
        $img = new SmartImage($file["tmp_name"]);
        $img ->resize(200, 150);
        $img ->saveImage("utenti/".$id."/profile.jpg"); } }
        echo' <script language="javascript">document.location.href="areaprofilo.php";</script>';
        }else{
        echo "Errore";
    }
} ?></div>

<!-- Tessera FISE --><?php
$PTQ = mysql_query("SELECT * FROM  patentiFISE WHERE utente = '$id'");
echo '<div style="position:absolute;top:332px; left:28px;">';
if($PTQR= mysql_fetch_array($PTQ)){
$patente = $PTQR['patente'];
$num = $PTQR['numero'];
echo '<img width="200px" src="images\tessera.png"><div style="position:absolute; top:7px; left:10px;">
<div style="position:absolute; top:70px;"><input type="text" name="patente" id="patente" value="'.$patente.'" style="width:165px;text-align:center;"></div>
<div style="position:absolute; left:108px; width:20px;"><input type="text" name="num" id="num" value="'.$num.'" style="width:59px; height:8px; font-size:10px;"></div>
<div style="position:absolute; width:20px;"><form method="POST" action="#"><button type="submit" style="background-image:url('.$sites.'images/Delpatente.png);width:20px;height:19px" id="DELETE_PATENT" name="DELETE_PATENT"></button></form></div></div>'; } else { echo '<center><label>Hai una patente FISE?</label>'; 
echo '<img width="200px" src="images\tessera.png"><form method="POST" action="#">
<div style="position:absolute; left:130px; top:30px; width:30px"><input type="text" name="numadd" id="numadd" value="Numero" style="width:59px; height:8px; font-size:11px; text-align:center;"></div>
<div style="position:absolute; top:100px;left:23px;"><input type="text" name="patenteadd" id="patenteadd" value="Nome" style="width:165px;text-align:center;"></div><label style="margin-top:10px">Presso:</label><select name="maneggio" id="maneggio" style="width: 200px;margin-top:5px"><option value="" selected>Scegli maneggio</option><option value="" >Non è presente il maneggio</option>';
$querycercamaneggi= mysql_query("SELECT * FROM maneggi ");
while($arraymaneggi = mysql_fetch_array($querycercamaneggi)) {
$nmmaneggio = $arraymaneggi['nome'];
$idmaneggio = $arraymaneggi['id'];
echo '<option value="'.$idmaneggio.'">'.$nmmaneggio.'</option>';
}
echo '</select><button type="submit" id="ADD_PATENT" name="ADD_PATENT" style="width:80px;height:30px;margin-top:10px" class="defaultbutton" >Aggiungi</button></center></form></div>'; } 
if(isset($_POST['DELETE_PATENT'])){
$querydelete = mysql_query("DELETE FROM patentiFISE WHERE utente = '$id'"); ?>
<script language="javascript">
document.location.href="areaprofilo.php";
</script><? } 
if(isset($_POST['ADD_PATENT'])){
$numpatente = $_POST['numadd'];
$nompatente = $_POST['patenteadd'];
$presso = $_POST['maneggio'];
if($numpatente != "" &&  $nompatente != ""  && $numpatente != "Numero" && $nompatente != "Nome") { $queryadd = mysql_query("INSERT INTO patentiFISE (utente,numero,patente,presso) VALUES ('$id','$numpatente','$nompatente','$presso')"); if($queryadd == TRUE) { ?>
<script language="javascript">
document.location.href="areaprofilo.php";
</script>
<? } }else{ echo '<div style="position:absolute; top:600px;left:68px;"><label>Completare tutti i campi!</label></div>'; } } 
echo '</div></div></div>';
include 'script/banner/destra.html';
?>