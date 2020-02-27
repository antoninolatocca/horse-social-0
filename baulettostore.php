<?php include 'header.php'; include 'pannello.php'; include 'text.php'; include 'button.php'; include'rindirizza.php'?>
<div id="AreaHome" class="facciata">
<div  style="position: absolute; width: 550px; z-index: 2; left: 180px;"> 
<p style="color:white;">Aggiungi altri oggetti al tuo bauletto...</p></div>
<div  style="position: absolute; width: 550px; z-index: 1; left: 180px; top: 30px"> 
<hr width="800" size="1" color="white" align="center"></div>
<div  style="position: absolute; width: 200px; z-index: 2; left: 800px; top: 60px">
<p>Aggiungi gratis gli oggetti che possiedi veramente al tuo bauletto virtuale.<br>E' importante che tu aggiunga solo quello che possiedi veramente. Grazie!</p>
</div>
<div  id="AreaCLome">

<fieldset style="width:480px;"><legend align="center" style="color:#FFf">Segnalaci un nuovo oggetto</legend>
<form method="POST" action="#"  enctype="multipart/form-data">
<table><tr><td><label>Titolo: </label></td><td><div class="centrata"><input type="text" name="attrezzo" style="width:350px"></div></td></tr>
<tr><td><label>Descrizione: </label></td><td><div class="centrata"><input type="text" name="descrizione" rows="3" style="width:350px"></div></td></tr><td><label>Categoria: </label></td><td><div class="centrata"><select id="categoria" name="categoria" style="width:350px;"><option value="1">Prodotti</option><option value="2">Spazzole</option><option value="3">Abbigliamento</option><option value="4">Finimenti</option><option value="5">Aiuti</option><option value="6">Sottosella</option><option value="7">Selle</option><option value="8">Salvaschiena</option><option value="9">Sottopancia</option><option value="10">Capezze</option><option value="11">Testerie</option><option value="12">Fasce</option><option value="13">Coperte</option><option value="14">Altri groom</option>
</select></div></td></tr></table>
<div class="centrata"><label>* L'immagine deve essere in formato PNG</label><input name="image" type="file"/><input type="submit" value="Invia"  name="invia" class="buttonindexreglog"/></div>
</form>
</fieldset><br><br>
<?php
$path = "baule/";
if($handle = opendir($path)){
  $files = array(png, jpg, jpeg, gif);
  while(false !== ($file = readdir($handle))){
    if($file != '.' && $file != '..'){
      $files = $file;
      $titol = mysql_result(mysql_query("SELECT attrezzo FROM oggetti_bauletto WHERE id ='$file'"),"attrezzo");
      echo '<a href="'.$path.$file.'?'.time().'" rel="shadowbox"><img alt="'.$titol.'" src="'.$path.$file.'" title="'.$titol.'" style="margin-right:10px; margin-bottom:10px; max-width:200px;max-height:200px;"></a>';
      // Bisogna aggiungere l'oggetto alla tabella 'bauletti' con l'id dell'utente
      // Stampare un messaggio di avvenuto aggiornamento
    } 
  } 
}?>
</div>
</div>
<?php
if(isset($_POST['invia'])){
$attrezzo = $_POST['attrezzo'];
$descrizione = $_POST['descrizione'];
$categoria = $_POST['categoria'];
$insert = mysql_query("INSERT INTO oggetti_bauletto (categoria, attrezzo, descrizione) VALUES ('$categoria', '$attrezzo', '$descrizione')");
if($insert) {  
$selectid = mysql_query("SELECT * FROM oggetti_bauletto WHERE attrezzo = '$attrezzo' AND descrizione = '$descrizione' ");
$rowqd=mysql_fetch_array($selectid);
{
$nomeogg=$rowqd['id'];
}
do {
  if(is_uploaded_file($_FILES['image']['tmp_name'])){
    if($_FILES['image']['size'] > 2048000){
      $msg = "<p class='status'>Il file non deve superare i 2 MB!!</p>";
      break;
       }
    list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
    if(($width > 2048) || ($height > 2048)){
      $msg = "<p class='status'>Dimensioni non corrette!!</p>";
      break;
       }
    if(($type!=1) && ($type!=2) && ($type!=3)){
      $msg = "<p class='status'>Formato non corretto!!</p>";
      break; 
       }
    if(file_exists("baule/".$_FILES['image']['name'])){
      $msg = "<p class='status'>File già esistente sul server. Rinominarlo e riprovare.</p>";
      break; 
      }
    if(!move_uploaded_file($_FILES['image']['tmp_name'], "baule/".$_FILES['image']['name'])){
      $msg = "<p class='status'>Errore nel caricamento dell'immagine!!</p>";
      break; 
      } else {
    $nameogg = "baule/".$nomeogg.".png";
    if(!rename($_FILES['image']['name'], $nameogg) == TRUE){
      $msg = "<p class='status'>Errore nel rinominare l'immagine!!</p>";
      break; 
      } }
    } else $msg=NULL;
  } while (false);
echo $msg;
} }
include 'script/banner/destra.html';
?>