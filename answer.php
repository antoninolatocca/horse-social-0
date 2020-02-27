<?php include 'header.php'; include 'pannello.php'; include 'text.php'; include 'button_GE.html'; include'rindirizza.php'; include 'work.php'; 
$user = $_SESSION['utente'] ?>
<div id="AreaPost">
<? 
$label = "Domanda:";
$textareastate = "Ciao ".$_SESSION['nome'].", qual è la tua domanda?";
?>
<form method="post" action="#" id="message">
<label><? echo $label; ?></label>		
<textarea  name="message" id="message" class="postareatxt"
<input=""  onclick="if (this.value=='<? echo $textareastate; ?>') 
this.value='';" onblur="if (this.value=='') this.value='<? echo $textareastate; ?>';"
type="text" value="<? echo $textareastate; ?>">
<? echo $textareastate; ?></textarea><br>
<div class="centrata"><input type="submit" name="submit" style="width:260px;height:23px;"id="pubblica" value="<? echo 'Pubblica'; ?>" /></div>                
</form>
<?
if($_POST['message'] != "" AND $_POST['message'] != $textareastate){
$post = $_POST['message'];
$data = date("H:i:s m/d/y");
$qanswer = mysql_query("INSERT INTO answer (user,text,data) VALUES ('$id','$post','$data')");
if($qanswer == TRUE) {
?>
<script language="javascript">
document.location.href="answer.php";
</script>
<? } } 
echo '</div>';
include 'script/bunneright.php';
?>