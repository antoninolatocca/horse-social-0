<?php include 'header.php'; include 'pannello.php'; include 'text.php'; include 'button_GE.html'; include 'rindirizza.php';
if(isset($_SESSION['utente'])){ $_GET['new'] = filter_var($_GET['new'],FILTER_VALIDATE_INT); $_GET['type'] = filter_var($_GET['type'],FILTER_VALIDATE_INT);
$id = $_SESSION['id']; 
echo '<div id="AreaPost" style="width:919px;" >';
if(!($_GET['new'])){ 
echo'<button type="submit" onclick="javascript:window.location.href=\'annunci.php?new=1&type=1\'" class="buttonindexreglog">+ Crea Annuncio</button><hr width="919">';
$annunciproprio = mysql_query("SELECT * FROM annunci WHERE user = '$id'");
if(mysql_num_rows($annunciproprio) > 0){
echo '<p>I tuoi annunci</p><br>';
while($rowannunci = mysql_fetch_array($annunciproprio)){
$titoloAN = $rowannunci['titolo'];
$corpoAN = $rowannunci['testo'];
$tipoAN = $rowannunci['tipo'];
$dataAN = $rowannunci['data'];
$fotoAN = $rowannunci['foto'];
$idAN = $rowannunci['id'];
echo '<div style="margin-top:10px;width:400px;"><h3 style="color:#FFF;" >'.$titoloAN.'</h3>';
if($fotoAN != NULL) $immagineAN = $sites.'annunci/'.$idAN.$fotoAN;
else $immagineAN = $sites.'images/predefinitoannuncio.jpg';
$Corpo_annuncio = '<p style="text-align:justify"><a href="'.$immagineAN.'?'.time().'" rel="shadowbox"><img src="'.$immagineAN.'?'.time().'" style="vertical-align: top; float:left; margin: 0 10px 10px 0" height="100"></a>'.$corpoAN.'</p>';
echo $Corpo_annuncio.'<label>'.$dataAN.'</label></div><br><br><br>'; 
} }else{
echo '<br><br><br><p>Nessun annuncio inserito.</p>';
} }elseif($_GET['new'] == 1){ ?>
<table><tr><td align="left"><h2 style="color:#FFF;">Inserisci i tuoi dati: </h2></td></td><td align="right"><button onclick="javascript:window.location.href='annunci.php'" class="buttonindexreglog">Annulla</button></td></tr><tr><td><form method="POST">
<label for="nome">Nome: *</label></td><td><label for="cognome">Cognome: *</label></td></tr>
<tr width="200px"><td><input type="text" name="nome"  value="<?php echo $_SESSION['nome']; ?>"></td><td><input type="text" name="cognome" id="cognome" value="<?php echo $_SESSION['cognome']; ?>"></td></tr>
<tr><td><label for="email">E-mail: *</label></td><td><label for="cell">Cellulare: </label></td></tr>
<tr><td><input type="text" name="email"  value="<?php echo $_SESSION['email']; ?>"></td><td><input type="text" name="cell"  value="<?php echo $_SESSION['cell']; ?>"></td></tr>
<td><label for="Citta">Città: </label></td></tr>
<tr><td><input type="text" name="citta"  value=""></tr></table>
<div style="position: absolute;left:480px;top:0px;"><table>
<tr><td width="200px" align="left"><h2 style="color:#FFF;">Inserisci i dati del: </h2></td><td align="right"><select name="tipoAN"  style="width: 150px" onchange="javascript:window.location.href='annunci.php?new=1&type=+this.selected;'"><option value="1" selected>Animale</option><option value="2">Oggetto</option></select></td></tr>
<tr><td><label for="nome">Nome: *</label></td><td><label for="Type">Tipo di animale: *</label></td></tr><tr>
<td><input type="text" name="nome" id="nome" value=""></td><td><input type="text" name="tipo" value=""></td></tr><tr><td><label for="razza">Razza: *</label></td><td><label for="peso">Peso: </label></td></tr><tr><td><input type="text" name="razza" id="razza" value=""></td><td><input type="text" name="peso" id="peso" value=""></td></tr><tr><td><label for="h">Altezza: </td><td><label for="mantello">Mantello: </label></td></tr><tr><td><input type="text" name="altezza" id="altezza" value=""></td><td><input type="text" name="mantello" id="mantello" value=""></td></tr>
<tr><td><label for="eta">Età: *</label></td><td><label for="prezzo">Prezzo: *</label></td></tr><tr><td><input type="text" name="eta" value=""></td><td><input type="text" name="prezzo"  value=""></td></tr></table><div class="centrata"><label>Aggiungi Immagine</label><input type="file"></div></div><br><br><br><br><br><br><br><div class="centrata"><label>Tutti i campi con * sono obbligatori</label>
<input type="submit"  style="width:120px;margin-top:10px;" class="buttonindexreglog" name="NEWAN" value="Crea"/></form></div></div>
<? if(isset($_POST['NEWAN'])){


 } } echo '</div>'; include 'script/bunneright.php'; } ?>