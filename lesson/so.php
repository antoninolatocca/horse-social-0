<? include '../header.php';include '../pannello.php';include '../text.php';include '../button_GE.html';
 include '../rindirizza.php';
echo '<div id="Backlesson"><img src="'.$sites.'maneggi/2/rance/image478.jpg" width="1000" height="700"/></div>
<div id="divtrasp" class="opaco"></div>
<div id="circleufficio" class="circle"></div>
<div id="indietro"><a href="'.$sites.'lesson/start.php"><input type="button" class="buttonLV" style="background-color:#3F4954; width:100px; height:35px;" value="Indietro"></a></div>
<div id="ostacoli" style="position:absolute;z-index:2;left:340px;top:300px;width:750px;"><p>Ecco alcuni ostacoli:</p><div class="centrata">';
$path = "diapositive/ostacoli/";
if($handle = opendir($path)){
 while (false !== ($file2 = readdir($handle))){
  if($file2 != '.' && $file2 != '..' && $file2 != 'bariera.png' && $file2 != 'piviere.png'){
   $UR = $path.$file2;
   echo '<a href="'.$UR.'" rel="shadowbox"><img alt="'.$file2.'" src="'.$UR.'" title="'.$file2.'" style="height:100px;margin:0 10px 10px 0;"></a>';
  }
 } 
} ?>
</div>
<p>Le fasi del salto sono principalmente 4: <b>avvicinamento</b>, <b>battuta</b> (o <i>stacco</i>), <b>sospensione</b>, <b>ricezione</b>.<br>E' importante sapere che nella fase della battuta, il cavallo concentra tutto il peso sui posteriori, mentre nella fase di ricezione, il peso è concentrato sugli anteriori.<br>Il salto descrive una figura geometrica che si chiama <i>parabola</i>.</p>
</div>