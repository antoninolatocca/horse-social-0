<?php include '../header.php'; include '../pannello.php'; include '../button_LG.php'; include '../text.php'; ?>

<div class="titologallery">
<p class="utente">Libertà</p><hr width=100% size=2 color=#D3D3D3>
</div>

<div class="icone" style="width:1100px;"><?

$path = "foto/album/liberta/";
if($handle = opendir($path)){
  $files = array(png, jpg, jpeg, gif);
  while(false !== ($file = readdir($handle))){
    if($file != '.' && $file != '..'){
      $files = $file;
      if($files != "COVER.png"){
        echo '<img alt="'.$file.'" src="'.$path.$file.'" title="'.$file.'" style="margin-right:10px; margin-bottom:10px; max-width:300px;max-height:300px;">';
      }
    } 
  } 
}
?>

</div>