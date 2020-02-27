<?php
include 'header.php';
include 'pannello.php';
include 'button_IG.php';
include 'rindirizza.php';
include 'script/conto.php';
$magazine =  mysql_query("SELECT * FROM magazine");
echo '<div id="pagestore">';
echo '<label class="etichetta">Store</label><hr><br>';
while($rowmag = mysql_fetch_array($magazine)){
$ref = $rowmag['referente'];
$titol = '<b>'.$rowmag[titolo].'</b>';
if($ref != 'NULL'){
$CONmand = mysql_query("SELECT * FROM utenti WHERE id = '$ref'");
$aut = mysql_fetch_array($CONmand);
if(mysql_num_rows($CONmand) == 1){
$heads = $titol.' - <a href="user.php?ID='.$ref.'" style="text-decoration:none;"><i>'.$aut[nome].' '.$aut[cognome].'</i></a>';
}else $heads = $titol;
}
echo '<p class="centerwhite" style="font-size:22px;">'.$heads.'</p><div style="width:100%;overflow:scroll;border:inset;"><table class="centrata"><tr width="100%">';
$idmag = $rowmag['id'];
$articoly = mysql_query("SELECT * FROM articoli_store WHERE magazine = '$idmag'");
while($artrows = mysql_fetch_array($articoly)){
$attack = str_replace(" ", "", $rowmag['titolo']);
$primayID = $artrows['id'];
$edizione = $artrows['edizione'];
$word = explode(" ", $rowmag['titolo']);
$sigla = substr($word[0], 0, 1).substr($word[1], 0, 1).substr($word[2], 0, 1);
$i3m = $attack.'/'.$sigla.'_'.$edizione.'.png';
$immagine = $sites.'store/'.$i3m;
$file = $sites.'store/'.$attack.'/'.$sigla.'_'.$edizione.'.pdf';
$prezzo = $artrows['prezzo'];
echo '<td><p class="centerwhite">N°'.$edizione.'</p><img src="'.$immagine.'" height="200" style="margin-right:20px;margin-left:20px;"><br>';
if($cercaacquisti = mysql_num_rows(mysql_query("SELECT * FROM acquisti WHERE utente = '$id' AND prodotto = '$primayID' ")) > 0){
echo '<a href="'.$file.'" target="_blank"><input type="submit" name="'.$value.'" value="Leggi" style="background-color:#03C03C;"></a>';
}else{
if($prezzo == "F"){
$value = "Gratis";
echo '<form method="POST">
<input type="hidden" style="visibility:hidden;width:0px;" name="progetto" value='.$primayID.'>
<input type="submit" name="buy" value="'.$value.'" style="background-color:#03C03C;">
</form>';
}else{
if($conto >= $prezzo){
echo '<form method="POST">
<input type="hidden" style="visibility:hidden;width:0px;" name="progetto" value='.$primayID.'>
<input type="submit" name="buy" value="&#8364; '.$prezzo.'" style="background-color:#03C03C;">
</form>';
}else{
echo '<input type="submit" value="&#8364; '.$prezzo.'" style="background-color:#FF3399;">';
}
}
}
echo '</td>';
}
echo '</tr></table></div><br><br><br>';
} echo '</div>';


if(isset($_POST['buy'])){
$idOBJ = $_POST['progetto'];
if($idOBJ > 0 ){
$accquery = mysql_query("SELECT * FROM articoli_store WHERE id = '$idOBJ'");
$articoliexist = mysql_num_rows($accquery);
if($articoliexist == 1){
$barray = mysql_fetch_array($accquery);
$DAT = date ("Y-m-d H:i:s");
function acquisto($DAT, $idOBJ, $id){
$iii = mysql_query("INSERT INTO acquisti (utente, data, prodotto) VALUES ('$id', '$DAT', '$idOBJ')");
echo '<script language="javascript">
	    window.alert("Il prodotto è stato aggiunto alla tua libreria!");
            document.location.href="http://hightterabyte.altervista.org/arealibreria.php";</script>';
}

if($barray['prezzo'] != 'F'){
$conteggio = mysql_query("SELECT * FROM reso WHERE utente = '$id'");
$arrayhsu = mysql_fetch_array($conteggio);
while($coi = mysql_num_rows($conteggio)){
$conto += $arrayhsu['valore'];
}
if($conto >= $barray['prezzo']){
$hjkl = mysql_query("SELECT * FROM magazine WHERE id = '$barray[magazine]'");
$asdfgh = mysql_fetch_array($hjkl);
$titolo = $asdfgh['titolo'];
$description = "Acquisto ".$barray['edizione']."&#170; edizione di &#39;".$titolo."&#39;";
$stato = 'confermato';
$tipo = 'addebito';
$soldupdate = mysql_query("INSERT INTO reso (utente, transazione, data, tipo, stato, valore) VALUES ('$id', '$description', '$DAT', '$tipo', '$stato', '$barray[prezzo]')");
$post = $_SESSION['utente']." ha appena acquistato la ".$barray['edizione']."&#170; edizione di &#39;".$titolo."&#39;";
$RPLC = str_replace(" ", "", $titolo);
$primayID1 = $barray['id'];
$edizione1 = $barray['edizione'];
$wordK = explode(" ", $titolo);
$sigla1 = substr($wordK[0], 0, 1).substr($wordK[1], 0, 1).substr($wordK[2], 0, 1);
$i3m1 = '#'.$RPLC.'/'.$sigla1.'_'.$edizione1.'.png';
$condividi = mysql_query("INSERT INTO post (utente, data, post, img) VALUES ('$id', '$DAT', '$post', '$i3m1')");
}
acquisto($DAT,$idOBJ,$id);
}else{
acquisto($DAT,$idOBJ,$id);
}
} else $msg = 'Nessun articolo trovato';
} else $msg = 'ID non valido: '.$idOBJ;
echo $msg;
}
?>