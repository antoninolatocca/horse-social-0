<?php 
include 'header.php'; 
include 'pannello.php'; 
include 'button.php'; 
?>
<div id="AreaHome" class="facciata">
<div  style="position: absolute; width: 550px; z-index: 2; left: 180px; top: 0px"> 
<p>Questa è la tua galleria!</p></div>
<div  style="position: absolute; width: 550px; z-index: 1; left: 180px; top: 30px"> 
<hr width="850" size="1" color="white" align="center">
</div>
<div style="position: absolute; width: 620px; z-index: 2; left: 400px; top: 8px"> 
<form action="#" method="post" enctype="multipart/form-data">
<input name="image[]" type="file" size="40" multiple/><input name="upload" type="submit" value="Aggiungi" class="defaultbutton"/>
<input name="album" type="submit" value="Crea album" class="defaultbutton" style="display:none"/>
<input name="delete" id="delete" type="submit" value="Elimina" class="defaultbutton" style="display:none"/>
<input name="use" type="submit" value="Usa come" class="defaultbutton" style="display:none"/>
</form>
<?php
foreach ($_FILES['image']['name'] as $filename){
do {
  if(is_uploaded_file($_FILES['image']['tmp_name'])){
    if($_FILES['image']['size'] > 2048000){
      $msg = "<p>Il file non deve superare i 2 MB!!</p>";
      break;
       } else $msg = NULL;
    list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
    if(($width > 2048) || ($height > 1536)){
      $msg = "<p>Dimensioni non corrette!!</p>";
      break;
       } else $msg = NULL;
    if(($type!=1) && ($type!=2) && ($type!=3)){
      $msg = "<p>Formato non corretto!!</p>";
      break; 
       } else $msg = NULL;
    if(file_exists("utenti/".$_SESSION['id']."/immagini/foto/".$_FILES['image']['name'])){
      $msg = "<p>File già esistente sul server. Rinominarlo e riprovare.</p>";
      break; 
      } else $msg = NULL;
    if(!move_uploaded_file($_FILES['image']['tmp_name'], "utenti/".$_SESSION['id']."/immagini/foto/".$_FILES['image']['name'])){
      $msg = "<p>Errore nel caricamento dell'immagine!!</p>";
      break; 
      } else $msg = NULL; 
    } else $msg = NULL;
} while (false);
echo $msg;
}
?></div>
<div id="AreaCLome"> 
<?php
$iimg = 1;
$path = "utenti/".$_SESSION['id']."/immagini/foto/";
if($handle = opendir($path)){
  echo '<label>Foto caricate:</label><br>';
  while (false !== ($file2 = readdir($handle))){
    if($file2 != '.' && $file2 != '..'){
      $files2 = $file2;
      echo '<img id="myimage'.$iimg.'" alt="'.$file2.'" src="'.$path.$file2.'" title="'.$file2.'" class="sizegallery" onclick="immagine(this);">';
      $iimg++;
    }
  } 
} 
if($iimg == 1) echo '<p>Nessuna foto caricata</p>';
$iimgpost = 1;
$pathPO = "utenti/".$_SESSION['id']."/immagini/post/";
if($handdle = opendir($pathPO)){
  echo '<br><br><label>Foto pubblicate:</label><br>';
  while (false !== ($fileppp = readdir($handdle))){
    if($fileppp != '.' && $fileppp != '..'){
      $files2P = $fileppp;
      $til = mysql_fetch_array(mysql_query("SELECT post FROM post WHERE img = '$files2P'"));
      echo '<img id="myimage'.$iimg.'" alt="'.$til[post].'" src="'.$pathPO.$files2P.'" title="'.$til[post].'" class="sizegallery" onclick="immagine(this);">';
      $iimgpost++;
               }
  } 
} 
if($iimgpost == 1) echo '<p>Nessuna foto pubblicata con i post.</p>';
?>
<br><br><label>Immagini di copertina:</label><br><?php
$path3 = "utenti/".$_SESSION['id']."/cover.jpg";
if(file_exists($path3)) {
echo '<img alt="Immagine di copertina attuale" src="'.$path3.'?'.time().'" title="cover attuale" class="sizegallery">';
} else echo "<p class='status'>Nessuna immagine di copertina caricata!</p>";
$path2 = "utenti/".$_SESSION['id']."/immagini/cover/";
if($handle2 = opendir($path2)){
  while (false !== ($file2 = readdir($handle2))){
    if($file2 != '.' && $file2 != '..'){
      $files2 = $file2;
      echo '<img id="myimage" alt="'.$file2.'" src="'.$path2.$file2.'?'.time().'" title="'.$file2.'" class="sizegallery" onclick="immagine(this);">';
    }
  }
} ?>
<br><br><label>Immagini del profilo:</label><br><?php
$path5 = "utenti/".$_SESSION['id']."/profile.jpg?".time();
echo '<img alt="Immagine di profilo attuale" src="'.$path5.'" title="immagine del profilo attuale" class="sizegallery" ';  
$path6 = "utenti/".$_SESSION['id']."/immagini/profilo/";
if($handle2b = opendir($path6)){
   while (false !== ($file2 = readdir($handle2b))){
    if($file2 != '.' && $file2 != '..'){
      $files2 = $file2;
      echo '<img id="myimage" src="'.$path6.$file2.'?'.time().'" class="sizegallery" onclick="immagine(this);">';
    }
  }
}
echo '<br></div></div>';
include 'script/banner/destra.html';
?>