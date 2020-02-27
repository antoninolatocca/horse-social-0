<?php include '../../header.php'; include '../../pannello.php'; include '../../text.php'; include '../../button_GE.html';

  if(isset($_SESSION['id'])){
   echo '<div id="indietro"  style="position : absolute; top: 290px; left: 1000px; z-index:2;"><a href="'.$sites.'lesson/start.php"><input type="button" class="buttonLV" style="background-color: #3F4954; width: 100px; height: 35px;" value="Indietro"></a></div>';
   echo '<div id="quizpage"  style="position:absolute; z-index:1; width:900px; left:220px; top:270px;">
<H2 class="centerwhite">Risolvi i nostri quiz! <form name="arg"><select name="argo" onChange="">';
$select = mysql_query("SELECT argomento FROM argomenti");
$num = mysql_numrows($select);
$i=0;
 while($i < $num){
   $nome = mysql_result($select,$i);
   $idarg = mysql_query("SELECT id FROM argomenti WHERE argomento = $nome");
   $action = setcookie("arg", $idarg);
   echo '<option value="'.$idarg.'" onclick="'.$acrtion.'">'.$nome.'</option>';
   $i++;
 }
echo '</select></form></H2><br>';
$selectarg = $_COOKIE['arg'];
echo '<h1 class="centerwhite">'.$selectarg.'</h1>';
$read = mysql_query("SELECT testo FROM quiz_domande WHERE arg = '$selectarg'");
$num2 = mysql_numrows($read);
$i=0;
 while($i < $num2){
   $interrogazione = mysql_result($read,$i);
   echo '<p class="centerwhite">'.$interrogazione.'</p>';
   $i++;
 }
echo '</div>';
  }
?>