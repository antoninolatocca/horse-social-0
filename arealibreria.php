<?php 
include 'header.php';
include 'pannello.php';
include 'button.php';
$immagine = $sites."images/image1222.png";
echo '<div style="position:absolute; left:260px; top:290px; z-index:4;width:700px;">';
$ACt = mysql_query("SELECT * FROM acquisti WHERE utente = '$id'");
$num = mysql_num_rows($ACt);
while($docs = mysql_fetch_array($ACt)){
$articoly = mysql_query("SELECT * FROM articoli_store WHERE id = '$docs[prodotto]'");
while($artrows = mysql_fetch_array($articoly)){
$edizione = $artrows['edizione'];
$idmagazine = $artrows['magazine'];
$magazine =  mysql_query("SELECT * FROM magazine WHERE id = '$idmagazine'");
while($rowmag = mysql_fetch_array($magazine)){
$attack = str_replace(" ", "", $rowmag['titolo']);
$word = explode(" ", $rowmag['titolo']);
}
$SIG = substr($word[0], 0, 1).substr($word[1], 0, 1).substr($word[2], 0, 1);
$IMG = $sites.'store/'.$attack.'/'.$SIG.'_'.$edizione.'.png';
$FIL = $sites.'store/'.$attack.'/'.$SIG.'_'.$edizione.'.pdf';
}
echo '<a href="'.$FIL.'" target="_blank"><img src="'.$IMG.'" height="120" style="margin:25px 22px 40px 22px"></a>';
$num--;
}
if(mysql_num_rows($ACt) == 0) echo '<br><br><div class="centrata"><p>Nessun Documento acquistato.</p></div>';
echo '</div>';
echo '<div  style="position: absolute; width: 150px; z-index: 2; left: 280px; top:260px;"> 
<label>Documenti acquistati:</label>
</div>'; 
include 'script/banner/destra.html'; ?>
<div id="store" style="position: absolute; left: 850px; top:250px;">
<label>Aquista file:</label><a href="store.php"><input type="submit" name="invia" value="Vai allo store" class="defaultbutton"/></a></div>
<? 
echo '<div id="libreria1" style="position: absolute; left: 220px; top: 420px;">
<img src="'.$immagine.'" height="30" width="800" class="centrata"/></div>';
$nacquisti = mysql_num_rows(mysql_query("SELECT * FROM acquisti WHERE utente = '$id'"));
$top = 600; 
for($contatorei = 0; $nacquisti != 0; $contatorei++ ){
if($nacquisti % 5 == 0) {
echo '<div id="'.$contatorei.'" style="position: absolute; left: 220px; top: '.$top.'px;">
<img src="'.$immagine.'" height="30" width="800" class="centrata"/>
</div>';  $top = $top + 180; 
} $nacquisti--; } ?>