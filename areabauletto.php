<?php
include 'header.php'; 
include 'pannello.php'; 
include 'button.php'; 
?>

<div id="AreaHome" class="facciata">

<?php
$novo = 0;
$adress = "baule/";
if ($handle = opendir($adress)) {
$files = array(png, jpg, jpeg, gif);
while (false !== ($file = readdir($handle))) {
 if($file != '.' && $file != '..') $novo++;
}}
?>

<div  style="position: absolute; width: 550px; z-index: 2; left: 180px;"> 
<p style="color:white;">Questa è il tuo bauletto!</p></div>
<div  style="position: absolute; z-index: 2; left: 580px; top: 6px;">
<a href="baulettostore.php"><input name="aggiungi" type="submit" value="Aggiungi <? if($novo > 0) echo '('.$novo.')'; ?>" class="buttonindexreglog"/></a></div>
<div  style="position: absolute; width: 550px; z-index: 1; left: 180px; top: 30px"> 
<hr width="800" size="1" color="white" align="center">
</div>
<div id="AreaCLome"> 
<?php
$path = "baule/";
$idobject = mysql_query("SELECT oggetto FROM bauletti WHERE utente ='$id'");
while($ogg = mysql_fetch_array($idobject)){
$oggetto = $ogg['oggetto'];
$titol = mysql_result(mysql_query("SELECT attrezzo FROM oggetti_bauletto WHERE id ='$oggetto'"),"attrezzo");
echo '<img title="'.$titol.'" src="'.$path.$oggetto.'.png" style="margin-left:20px; margin-right:20px; margin-bottom:20px; max-width:100px;max-height:100px;">';
}
echo '</div></div>';
include 'script/banner/destra.html';
?>