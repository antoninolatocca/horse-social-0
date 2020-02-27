<?php
include'header.php';
include'pannello.php';
include'text.php';
include'script/banner/destra.html';
?>
<div id="page" style="position:absolute; left:80px; width: 1000px; top:210px;"><div class="centrata"><h1 class="centerwhite">Hai un maneggio? Vuoi far conoscere la tua azienda?<br><b>Crea il tuo sito con noi!</b></h1></div><br><br>
<img class="ruota5" style="width:520px;" src="http://hightterabyte.altervista.org/images/960218_524977924233154_1537268853_n.jpg"/>
<div style="position:absolute; left:600px; top:120px;"><h3 class="centerwhite">Fornisci alcune informazioni</h3><br>
<form method="POST" action="#"><table><tr><td><label for="nome">Nome:</label></td><td><label for="cognome">P. IVA:</label></td></tr>
<tr><td><input type="text" name="nome" id="nome" /></td><td><input type="text" name="cognome" id="cognome" /></td></tr>
<tr><td><label>Provincia:</label></td></tr>
<tr><td></td></tr><tr><td><input type="text" name="provincia" id="provincia"/></td></tr>
<tr><td><label>Regione:</label></td><td><label>Tipologia:</label></td></tr>
<tr><td><select  name="Regione" style="width:140px;"><option value="Valle D'Aosta">Valle D'Aosta</option><option value="Piemonte">Piemonte</option><option value="Lombardia">Lombardia</option><option value="Trentino Alto Adige">Trentino Alto Adige</option><option value="Liguria">Liguria</option><option value="Veneto">Veneto</option><option value="Friuli Venezia GIulia">Friuli Venezia Giulia</option><option value="Emilia Romagna">Emilia Romagna</option><option value="Umbria">Umbria</option><option value="Abruzzo">Abruzzo</option><option value="Toscana">Toscana</option><option value="Marche">Marche</option><option value="Molise">Molise</option><option value="Lazio">Lazio</option><option value="Campania">Campania</option><option value="Puglia">Puglia</option><option value="Basilicata">Basilicata</option><option value="Calabria">Calabria</option><option value="Sicilia">Sicilia</option><option value="Sardegna">Sardegna</option></select></td><td><select style="width:131px;"><option value="A.">Agriturismo</option><option value="C.E.">Centro Equestre</option><option value="C.I.">Centro Ippico</option><option value="M.">Maneggio</option><option value="S.">Scuderia</option></select><select><option value="Federale">Federale</option><option value="Privato">Privato</option></select></td></tr>
</div></table><br><label><input type="checkbox" name="autorizzazione" value="accetto"/>Sono autorizzato alla pubblicazione del materiale dell'associazione</label><br><div class="centrata"><input type="submit" style="width:150px;" id="CREATE_MANEGGIO" name="CREATE_MANEGGIO"value="Crea" class="buttonindexreglog"/></div></form></div>
<?php /*if(isset($_POST['CREATE_MANEGGIO'])){ 
$nomem=$_POST['CREATE_MANEGGIO'];
$luogom=$_POST['CREATE_MANEGGIO'];
$regionm=;
$tipologiam=$_POST['CREATE_MANEGGIO'];
$typem=$_POST['CREATE_MANEGGIO'];
$idproprietario=$_SESSION['id'];
 }*/?>
<!--<div style="position:absolute; top:500px;"><h3 class="centerwhite">Scegli i servizi</h3><table><tr><td width="50"><input type="checkbox" name="gallery" value="gallery"/></td><td width="400"><label>Galleria fotografica, carica tutte le immagini della galleria fotografica e organizzala per album, inserisci le informazioni, fai lasciare commenti, falle condividere con un click su Facebook ...</label></td><td width="200"><label class="centerwhite">Numero album</label><br><label class="centrata"><input type="text" name="N. album" value="3" style="width:20px;" class="centrata"> x &#8364; 1,00</label></td></tr>
<tr><td><input type="checkbox" name="maps" value="maps"/></td><td><label>Mappe di Google Maps per farti trovare più facilemnte graze a tutti i servizi offerti dalle nuove mappe di Google...</label></td><td width="200"><label class="centerwhite">Default</label><br><label class="centrata"><select name="mappe"><option value="Map">Mappa</option><option value="Sat">Satellite</option><option value="Ter">Territorio</option><option value="Earth">Earth</option></select> &#8364; 0,25</label></td><td width="100"><label class="centerwhite">Coordinate GPS</label><br><label class="centrata"><input type="text" name="GPS" value="00 00.000 - 000 00.00" style="width:150px;" class="centrata"></label></td></tr>
<tr><td><input type="checkbox" name="meteo" value="meteo"/></td><td><label>Includi indicazioni meteorologiche con le previsioni di ILmeteo <a href="http://www.ilmeteo.it/portale/servizi-web?refresh_ce" target="_blank">Dettagli</a></label></td><td><label class="centerwhite">Default</label><br><label class="centrata"><select name="meteo"><option value="A">Meteo giornaliero</option><option value="B">Meteo giornaliero animato</option><option value="C">Meteo fasce orarie</option><option value="D">Situazione in tempo reale</option><option value="E">Meteo triorario dettagliato</option><option value="F">Mari e venti</option></select></label></td><td><label class="centerwhite">Codice HTML</label><br><label class="centrata"><input type="text" name="HTML" value="" style="width:100%;" class="centrata"></label></td></tr></table></div>--!>