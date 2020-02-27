<?php include 'header.php'; include 'pannello.php'; include 'text.php';  include 'button_IG.php';
if(isset($_SESSION['utente'])){
$id = $_SESSION['id'];
echo '<div id="OfficeFORM" >';
if($id != 1){  ?>
<form method="post">
<label for="messaggio"><b><? echo $_SESSION['utente'];?></b>, Invia un messaggio alla redazione</label>
<textarea name="message" id="message" style="width: 400px; height: 50px" <input="" id="campo_id" onclick="if (this.value=='Contatta la redazione') 
this.value='';" onblur="if (this.value=='') 
this.value='Contatta la redazione';" type="text" value="Contatta la redazione">Contatta la redazione</textarea>
<div class="centrata"><input type="submit" name="invia" id="mex" value="Invia" style="width: 200px" /></div></form><br><br><?php } ?>
<div style="width:80%">
<p style="text-align:justify;"><img src="images/copertine/PIS_cover.png" height="150" style="margin:10px" align="left"><br>
<b>&#34;Pronti in sella&#34;: In fase di stesura il nuovo libro scritto da <a href="http://hightterabyte.altervista.org/user.php?ID=1">Antonino Latocca</a></b><br>
La copertina è stata scelta ora, i contenuti sono quasi completi, non resta che passare alle fasi di revisione e correzione, quindi alla pubblicazione. Posso assicurarvi che rimarette senza parole per tutte le novità apportate all'opera. Non resta che attendere...
</p></div><br><br><br><br>
<div class="centrata"><script type="text/javascript">
/* <![CDATA[ */
document.write('<s'+'cript type="text/javascript" src="http://ad.altervista.org/js.ad/size=300X250/r='+new Date().getTime()+'"><\/s'+'cript>');
/* ]]> */
</script></div>
</div>
<div class="circle" style="position: absolute; left: 570px; top: 230px;"></div>
<div style="position: absolute; left: 750px; top: 270px;"><p>Capo-redattore<br><a href="http://hightterabyte.altervista.org/user.php?ID=1"><b>Antonino Latocca</b></a></p></div>
<div style="position:absolute;top:540px;width:500px;z-index:2;left:180px;">
<img height="133" src="images/copertine/antoninocavalieracavallocopertina3d.png" width="117">
<img height="133" src="images/copertine/leduetorricopertina3d.png" width="117">
<img height="132" src="images/copertine/l'inversionedeiruolicopertina3d.png" width="117">
<img height="133" src="images/copertine/storiadiuncavalierecopertina3d.png" width="118"><br><br>
<img height="132" src="images/copertine/viscardelloallariscossacopertina3d.png" width="117"></div>
<div style="position: absolute; left: 140px; top: 660px;"><img src="images/image1222.png" height="25" width="560" class="centrata"/>
<div style="position: absolute; top: 150px;"><img src="images/image1222.png" height="25" width="560" class="centrata"/>
</div></div><?php
if($_POST['message'] != "" && $_POST['message'] != "Contatta la redazione"){
$msg = $_POST['message'];
$titolomsgR = "Redazione";
$dataMEX = date("H:i:s m/d/y");
$INmsgREX = mysql_query("INSERT INTO messaggi (id_mittente, id_destinatario, messaggio, titolo, data) VALUES ('$id', 1, '$msg', '$titolomsgR', '$dataMEX' )");
if($INmsgREX){?>
<script language="javascript">
	    window.alert("Messaggio inviato con successo verrai contattato entro 24 ore");
            function doRefresh() {
            document.location.reload();
            }
            window.setTimeout("doRefresh();" , 1000);
            </script>
<?}
}} ?>

<!--La Nuova Stagione-->
<div style="height:201px;left:200px;position:absolute;top:247px;width:310px">
<img height="200" src="images/copertine/La_Nuova_Stagione__adattamento_A4_.png">
<div id="Dati" style="position: absolute; left: 150px; top:0px">

	<h3 class="centerwhite"><b>La Nuova Stagione</b></h3>
	<p class="status">Autore: <b>Antonino Latocca</b></p>
	<p class="status">Lingua: italiana; Pagine: 49</p>
	<p class="status"><abbr title="International Standard Book Number">ISBN</abr>: 9788897436409</p>

<?php 
if(isset($_SESSION['utente'])){

$credit = mysql_query("SELECT conto FROM utenti WHERE id = '$id'");
while ($row = mysql_fetch_array($credit, MYSQL_BOTH)) {
$count = $row[0];
}
$conto = number_format(str_replace(",",".",$count), 2); 
if($conto > 4.00){ ?>

<form action="#" method="post" align="center">
<table><tr><input type="hidden" name="Pagamento" value="Pagamento" style="width: 120px"><select name="os0">
	<option value="Conto HS">Paga con conto HS</option>
	<option value="Carta"<? if($_POST[os0] == "Carta") echo 'selected'; ?>>Paga con carta</option>
</select></tr>
<tr align="center"><input type="submit" name="Prosegui" value="Prosegui" style="width: 130px" ></tr></table>
</form>

<?php }
 if(isset($_POST[Prosegui])){
  if($_POST[Pagamento] == "Conto HS"){
   if($conto > 4.00){
    $Nconto = $conto - 4;
$AC= "Acquisto del libro La Nuova Stagione - PDF";
$tipo = 0; $stato = 0;
    $setDB = mysql_query("UPDATE utenti SET conto='$Nconto' WHERE id='$id'");
    $insertDB = mysql_query("INSERT INTO resi (user, transizione, tipo, stato, valore) VALUES ('$id', '$AC','$tipo', '$stato', '$valus')");
   }
  }elseif($_POST[os0] == "Carta"){
   include 'LNS_paypal.php';
  }
 }
}else{
include 'LNS_paypal.php';?>

</div></div>
<!--
<div id="formUnloged">
<form method="post" action="#" id="meil">
<label>E-mail</label>
<input type="text" name="email" value="E-mail">
<label for="messaggio">Contatta la redazione</label>
<textarea name="message" id="message" style="width: 500px; height: 50px" <input="" id="campo_id" onclick="if (this.value=='Scrivi qui il messaggio') 
this.value='';" onblur="if (this.value=='') 
this.value='Scrivi qui il messaggio';" type="text" value="Scrivi qui il messaggio">Scrivi qui il messaggio</textarea>
<div class="centrata" style="width: 500px">
<input type="submit" name="invia" id="mex" value="Invia" style="width: 200px" /></div>
</form>
</div>-->
<?php } ?>