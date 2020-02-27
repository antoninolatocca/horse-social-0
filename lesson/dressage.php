<? include '../header.php';include '../pannello.php';include '../text.php';include '../button_GE.html';
 include '../rindirizza.php';
echo '<div id="Backlesson"><img src="'.$sites.'maneggi/2/rance/image478.jpg" width="1000" height="700"/></div>
<div id="divtrasp" class="opaco"></div>
<div id="circleufficio" class="circle"></div>
<div id="indietro"><a href="'.$sites.'lesson/start.php"><input type="button" class="buttonLV" style="background-color:#3F4954; width:100px; height:35px;" value="Indietro"></a></div>
<div id="ostacoli" style="position:absolute;z-index:2;left:340px;top:300px;width:750px;"><p>Ecco alcune figure di maneggio:</p><div class="centrata">';
$path = "diapositive/dressage/";
if($handle = opendir($path)){
 while (false !== ($file2 = readdir($handle))){
  if($file2 != '.' && $file2 != '..' && $file2 != 'campodressage20x40.png'){
   $UR = $path.$file2;
   echo '<a href="'.$UR.'" rel="shadowbox"><img alt="'.$file2.'" src="'.$UR.'" title="'.$file2.'" style="height:100px;margin:0 10px 10px 0;"></a>';
  }
 } 
} ?>
</div><br>
<p><img src="<?=$path;?>campodressage20x40.png" width="450" style="vertical-align: top; float: left; margin: 0 20px 20px 0">Un normale campo da dressage ha le dimensioni di 20x40 metri. I rettangoli per professionisti sono 20x60 m, e comprendono anche altri punti carini. <br>Il dressage è una disciplina olimpionica, e consiste nel saper effettuare un determinato percorso, costruito con le figure di maneggio (sopra elencate), dove il binomio deve effettuare con precisione ogni movimento.</p>
</div>