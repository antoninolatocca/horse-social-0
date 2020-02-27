<?php 
include 'header.php'; 
include 'pannello.php';
include 'button_IG.php';

if($id == 1){
$desk = "Pubblica un aggiornamento";
}else{
$desk = "Contatta la redazione";
}

echo '<div style="position:absolute;left:250px; top:275px; width:600px;">
<form method="post">
<div class="centrata">
<textarea  name="message" id="message" class="postareatxt" 
<input 
onclick="if (this.value==\''.$desk.'\') this.value=\'\';"
onblur="if (this.value==\'\') this.value=\''.$desk.'\';"
type="text" value="'.$desk.'">'.$desk.'</textarea><br>
<input type="submit" name="invia" class="defaultbutton" style="width:25%;" value="invia" />
</div>
<br><br>

<div style="width:80%">
<p>
<img src="images/copertine/PIS_cover.png" height="150" style="margin:15px" align="left"><br>
<b>&#34;Pronti in sella&#34;: In fase di stesura.<br>Ll nuovo libro di <a href="'.$sites.'user.php?ID=1">Antonino Latocca</a></b><br><br>
La copertina è stata scelta ora, i contenuti sono quasi completi, non resta che passare alle fasi di revisione e correzione, quindi alla pubblicazione. Posso assicurarvi che rimarette senza parole per tutte le novit&#224; apportate all\'opera. Non resta che attendere...
</p></div>
<br><br><br>

<div style="width:80%">
<p style="text-align:justify;">
<img src="images/copertine/La_Nuova_Stagione__adattamento_A4_.png" height="150" style="margin:15px" align="left"><br>
<b>La Nuova Stagione</b><br><br>
Autore: <b>Antonino Latocca</b><br>
Pagine: <b>49</b>, 
Anno: <b>2011</b><br>
<abbr title="International Standard Book Number">ISBN</abr>: <b>9788897436409</b><br>
</p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick"><input type="hidden" name="hosted_button_id" value="C3ZX9BFAHUY4G">
<input type="hidden" name="on0" value="Formato">
<select name="os0" style="width:150px;">
<option value="Cartaceo">Cartaceo &#8364;8,20 EUR</option><option value="Ebook PDF">Ebook PDF &#8364;4,00 EUR</option>
</select><br>
<input type="hidden" name="currency_code" value="EUR">
<input type="submit" name="submit" class="defaultbutton" value="Acquista" style="width:150px;">
</form>

</div>
<br><br><br>

<div style="width:140%">
<img height="150" src="images/copertine/antoninocavalieracavallocopertina3d.png" width="117">
<img height="150" src="images/copertine/leduetorricopertina3d.png" width="117">
<img height="150" src="images/copertine/l\'inversionedeiruolicopertina3d.png" width="117">
<img height="150" src="images/copertine/storiadiuncavalierecopertina3d.png" width="118">
<img height="150" src="images/copertine/viscardelloallariscossacopertina3d.png" width="117">
</div>

</div>';

echo '<div class="circle" style="position: absolute; left: 85%; top: 220px;"></div>';
echo '<div style="position: absolute; left: 75%; top: 270px;"><p class="status" style="text-align:right">Capo-redattore<br><a href="http://hightterabyte.altervista.org/user.php?ID=1"><b>Antonino Latocca</b></a></p></div>';

echo '<div style="position:absolute; left:72%;top:450px;">'; ?>
<script type="text/javascript">
/* <![CDATA[ */
document.write('<s'+'cript type="text/javascript" src="http://ad.altervista.org/js.ad/size=300X250/r='+new Date().getTime()+'"><\/s'+'cript>');
/* ]]> */
</script>
<?php
echo '</div>';

?>