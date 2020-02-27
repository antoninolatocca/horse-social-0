<?php 

	include '../header.php';
	include '../pannello.php';
	include '../text.php';
        include '../button_GE.html';

if(isset($_SESSION['utente'])){
?>
<div id="divtrasp" class="opaco"></div>
<div id="testo"  style="position : absolute; width: 600px; z-index: 3; left: 350px; top: 300px; height: 600px"><p>Ecco cosa ci occorre per la pulizia del cavallo:</p></div>

<div style="position : absolute; z-index: 4; left: 340px; top:350px;">
<table><tr class="centrata">
<td width="100" onmouseover="this.style.background='#0066FF'" onmouseout="this.style.background='transparent'"><a href="<? echo $sites; ?>lesson/grooming.php?get=striglia"><img src="<? echo $sites; ?>lesson/immagini/striglia.png" height="100"></a><br><p style="text-align:center">Striglia</p></td>
<td width="100" onmouseover="this.style.background='#0066FF'" onmouseout="this.style.background='transparent'"><img src="<? echo $sites; ?>lesson/immagini/bruscone2.png" height="100"><br><p style="text-align:center">Bruscone</p></td>
<td width="100" onmouseover="this.style.background='#0066FF'" onmouseout="this.style.background='transparent'"><img src="<? echo $sites; ?>lesson/immagini/brusca.png" height="100"><br><p style="text-align:center">Brusca</p></td>
<td width="100" onmouseover="this.style.background='#0066FF'" onmouseout="this.style.background='transparent'"><img src="<? echo $sites; ?>lesson/immagini/nettapiedi.png" height="100"><br><p style="text-align:center">Nettapiedi</p></td>
<td width="100" onmouseover="this.style.background='#0066FF'" onmouseout="this.style.background='transparent'"><img src="<? echo $sites; ?>lesson/immagini/pettine6.png" height="100"><br><p style="text-align:center">Pettine</p></td>
</tr></table>
</div>

<div style="position : absolute; z-index:1; left: 170px; top: 250px" >
<img src="<? echo $sites; ?>rance/images/image310.jpg" width="1000" height="700"/></div>

<div id="circleufficio" class="circle"></div>

<?php
 if(!empty($_GET)){
$ogg = $_GET['get']; ?>

<div id="indietro">
<a href="<? echo $sites; ?>lesson/grooming.php"><input type="button" class="buttonLV" style="background-color: #3F4954; width: 100px; height: 35px;" value="Indietro"></a></div>

<? if($ogg == "striglia"){ ?>

<div id="dettaglio"  style="position : absolute; width: 500px; z-index: 2; left: 250px; top: 550px; " class="backFFF" link="red">
<h2 class="centrata">La striglia</h2><br><p>La striglia può essere di gomma, di plastica o di ferro, la sua forma è circolare o ovoidale con cerchi concentrici, o file di denti.<br>La striglia serve per alzare la polvere depositata nel pelo del cavallo e far cadere tutti i peli staccati.<br>Nella monta inglese, si inizia sempre da sinistra del cavallo e poi a destra, partendo dalla testa e andando verso la groppa. A sinistra si striglia con la mano destra, a destra con la mano sinistra. Per alzare il pelo è necessario un movimento circolare continuo, con cerchi non molto grandi.<br>La testa va fatta, se necessario, con molta cura. In quanto alle zampe, con la striglia si può arrivare fino ai garretti, poi le ossa sporgenti delle zampe sono delicate e la loro forma rende impossibile strigliare.<br>Il costo di una striglia si aggira dagli 1 ai 3 euro.</p></div>

<div id="fotodescrizione" style="position : absolute; z-index: 2; left: 800px; top: 550px; height: 300px;" class="backFFF2">
<img src="" height="300" class="centrata">
</div>

<? }}else{ ?>
<div id="indietro">
<a href="<? echo $sites; ?>lesson/start.php"><input type="button" class="buttonLV" style="background-color: #3F4954; width: 100px; height: 35px;" value="Indietro"></a></div>
<div style="position : absolute; width: 200px; z-index: 2; left: 280px; top: 520px;"><img src="<? echo $sites; ?>lesson/immagini/bauletto.png" width="150"></div>
<div style="position : absolute; width: 500px; z-index: 3; left: 460px; top: 510px;">
<p>Questi oggetti vengono per comodità custoditi in appositi <i>bauletti da groom</i>. In quanto alle dimensioni ne esisteono di tre tipologie piuttosto standard (40x18x20cm, 42x25x27cm e 42x29,5x30cm). Alcuni modelli sono rinforzati per fungere anche da sedile, altri sono dotati di rotelle ed infine, la maggior parte sono dotati di una comoda vaschetta rimovibile.</p>
</div>
<div id="dettaglio"  style="position : absolute; width: 800px; z-index: 2; left: 255px; top: 650px; " class="backFFF" link="red">
<h2 class="centrata">La capezza</h2><br><p>Vi capiterà di trovare scritto anche <i>cavezza</i>. La capezza serve per poter acchiappare il cavallo e farlo muovere dove vogliamo noi.<BR>Ce ne sono di vari tipi e colori, ma la sostanza resta quella: all'interno deve entrare la testa del cavallo.<BR>Passato il muso e passate le orecchie, basta agganciare il morsetto.<BR>Ricordate che la si mette stando di fianco alla sinistra del cavallo e il morsettone si deve agganciare sempre a sinistra, altrimenti la capezza è messa storta.<BR>Pu&#242; capitare che la capezza si trovi con il morsettone agganciato e la fibbia che passa sulla testa, dietro le orecchie del cavallo, sia sganciata. &#200; pi&#249; facile mettere una capezza che si trova in questo modo. Di fatti basta passare il muso e poi passare il passante sulla testa del cavallo, dietro le orecchie. Questo per&#242 se almeno il morsettone &#232; agganciato, altrimenti, scegliete voi qual &#232; il modo più pratico e agganciate almeno uno dei due prima dia prire il box.<BR></p></div>
<? }} ?>