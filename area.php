<?php
include 'button.php';
include 'class/SmartImage.class.php';
$user = $_SESSION['utente']; 
?>
<div id="AreaPost"><?php $textareastate = "Ciao ".$_SESSION['nome'].", condividi ciò che pensi.."; ?>
<form method="post"  id="messaggio" enctype="multipart/form-data">
<!--<select name="sceltapost"><option value="due">Aggiungi Foto</option><option value="tre">Aggiungi Evento</option><option value="quattro">Aggiungi Annuncio</option></select>--!>
<?php
echo '<div class="centrata"><textarea  name="message" id="message" class="postareatxt" <input  
onclick="if (this.value==\''.$textareastate.'\') this.value=\'\';"
onblur="if (this.value==\'\') this.value=\''.$textareastate.'\';"
type="text" value="'.$textareastate.'">'.$textareastate.'</textarea></div>'; ?>

<div class="centrata"><input name="image" type="file" size="40" /><input type="submit" name="pubblica" class="defaultbutton" style="width:25%;" value="Pubblica" /></div><br>              
</form><? if(isset($_POST['pubblica'])) {
if($_POST['message'] != "" && $_POST['message'] != $textareastate){
  $contenuto = $_POST['message'];
  $data = date("H:i:s d/m/Y");
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
    if(file_exists("utenti/".$_SESSION['id']."/immagini/post/".$_FILES['image']['name'])){
      $msg = "<p>File già esistente sul server. Rinominarlo e riprovare.</p>";
      break; 
      } else $msg = NULL;
 $encrese = rand(1,1000000);
 $recrece = rand(1,1000000);
 $dataimm = date("d-m-Y_H-i-s");
While(file_exists($sites.'user/'.$id.'/immagini/post/'.$encrese.'_'.$recrece.'_'.$dataimm.'.png')){
 $encrese = rand(1,1000000);
 $recrece = rand(1,1000000);
}
$standardIMG = $encrese.'_'.$recrece.'_'.$dataimm.'.png';
    if(!move_uploaded_file($_FILES['image']['tmp_name'], "utenti/".$_SESSION['id']."/immagini/post/".$standardIMG)){
      $msg = "<p>Errore nel caricamento dell'immagine!!</p>";
      break; 
      } else  $msg = NULL; 
      $imgname = $standardIMG;
    } else $msg = NULL;
} while (false);
echo $msg; 
  $qpost = mysql_query("INSERT INTO post (utente,data,post,img) VALUES ('$id','$data','$contenuto','$imgname')");
  if($qpost == TRUE) { ?>
  <script language="javascript">
  document.location.href="index.php";
  </script>
  <?php } } } 
  include 'script/cercaeventi.php';
  echo '<br>';
  include 'script/newsarea.php';
?>
</div><div id="laterale">
<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FPronti-In-Sella-Antonino-Latocca%2F514287718687176&amp;width=300&amp;height=62&amp;colorscheme=dark&amp;show_faces=false&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:62px;" allowTransparency="true"></iframe><br><br>
<script type="text/javascript">/* <![CDATA[ */document.write('<s'+'cript type="text/javascript" src="http://ad.altervista.org/js.ad/size=300X250/r='+new Date().getTime()+'"><\/s'+'cript>');
/* ]]> */</script><br><br>
<div style="border:1px solid #FFF;width:300px">
<H2 class="centerwhite">Invita i tuoi amici</H2>
<p class="centerwhite">Per ogni amico iscritto ricevi subito <b>&#8364 0,50</b></p>
<div class="centrata">
<form method="post" action="#" id="invito">
<input type="email" name="email" autocomplete="on" placeholder="email@domain.ext" style="width:250px;"><br>
<input type="submit" name="invito" id="invito" value="Invita" class="defaultbutton"/>
</div></form><br>
</div>
<br>
<div style="border:1px solid #FFF;width:300px">
<H2 class="centerwhite">Ricarica il tuo conto</H2>
<p class="centerwhite">Scegli il taglio e ricarica subito!</p>
<center>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="4J8BBMW6FWDLW">
<table>
<tr><td><select name="os0" style="width:200px">
	<option value="5 euro">5 euro &#8364;5,00 EUR</option>
	<option value="10 euro">10 euro &#8364;10,00 EUR</option>
	<option value="20 euro">20 euro &#8364;20,00 EUR</option>
	<option value="25 euro">25 euro &#8364;25,00 EUR</option>
	<option value="50 euro">50 euro &#8364;50,00 EUR</option>
</select> </td></tr>
<tr><td><input type="hidden" name="currency_code" value="EUR"></td></tr>
<tr><td><div class="centrata"><input type="submit" name="submit" class="defaultbutton" value="Ricarica"></div></td></tr></table>
<img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
</form>
</center>
</div><br>
<a title="beruby.com - Risparmia acquistando online" href="http://it.beruby.com/promocode/uPoS_H">      
<img width="300" height="250" border="0" src="http://it.beruby.com/images/banner/banner-beruby-300x250-it-IT.gif" /></a><br><br>
<img height="400" width="300" src = "<? echo $sites; ?>images/copertine/La_Nuova_Stagione__adattamento_A4_.png" alt = "La Nuova Stagione"/>
<div class="centrata" id="paypalareadiv" style="width:100%">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick"><input type="hidden" name="hosted_button_id" value="C3ZX9BFAHUY4G">
<input type="hidden" name="on0" value="Formato"></td></tr><tr><td align="center"><select name="os0">
<option value="Cartaceo">Cartaceo &#8364 8,20 EUR</option><option value="Ebook PDF">Ebook PDF &#8364 4,00 EUR</option>
</select><input type="hidden" name="currency_code" value="EUR"><input type="submit" name="submit" class="defaultbutton" value="Acquista">
</form></div><br><br>
<a href="http://wwf.it/tu_puoi/sostenere_il_wwf/destinare_5_per_mille_wwf/" target="_blank"><img width="300" src="http://awsassets.wwfit.panda.org/img/banner472x314_3850.jpg"></a><br><br>
</div><?php if(isset($_POST['invito'])) {
if($_POST['invito'] != "" AND $_POST['invito'] != "E-mail dei tuoi amici..."){
$stringadati = $_POST['email'];
$mit = $_SESSION['email'];
$recuperauseremail = mysql_num_rows(mysql_query("SELECT id FROM utenti WHERE email='$stringadati'"));
if($recuperauseremail > 0){
?><script language="javascript">window.alert("E-mail già registrata!");
document.location.href="index.php";</script><?php }else{
$inserto = mysql_query("INSERT INTO inviti (utente, email) VALUES ('$id', '$stringadati')");
$to=$stringadati;
$subject="Invito di iscrizione a Horse Social da parte di ".$mit;
$header="Da: Horse Social";
$message="Registrati subito per usufruire di tutti i nostri contenuti e servizi!\n";
$message.="http://hightterabyte.altervista.org/register.php";
$sentmail=mail($to,$subject,$message,$header); ?>
<script language="javascript">window.alert("Richiesta di registrazione inviata! Ti verrà accreditato credito appena l'utente si registrerà!");document.location.href="index.php";</script>
<?php  } } else { ?><script language="javascript">document.location.href="index.php";</script><?php } } ?></div>