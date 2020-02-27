<?php include '../header.php'; include '../pannello.php'; include '../text.php'; include '../button_GE.html';

if(isset($_SESSION['utente'])){
?>

<div id="divtrasp" class="opaco"></div>
<div style="position : absolute; width: 800px; z-index: 2; left: 350px; top: 300px; height: 600px"><p>Ecco cosa ci occorre per iniziare subito a sellare:</p></div>
<div id="indietro">
<a href="<? echo $sites; ?>lesson/start.php"><input type="button" class="buttonLV" style="background-color: #3F4954; width: 100px; height: 35px;" value="Indietro"></a></div>

<div style="position : absolute; z-index:1; left: 170px; top: 250px" >
<img src="<? echo $sites; ?>rance/images/image310.jpg" width="1000" height="700"/></div>

<div id="circleufficio" class="circle"></div>
<?php } ?>