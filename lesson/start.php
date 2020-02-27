<? include '../header.php';include '../pannello.php';include '../text.php';include '../button_GE.html';
 if(isset($_SESSION['id'])){ 
$rance = $sites.'maneggi/2/rance/';?>

<div  style="position : absolute; width: 800px; z-index: 2; left: 280px; top: 280px; height:400px" class="opaco"></div>
<div style="position : absolute; width: 600px; z-index: 2; left: 400px; top: 300px; height:300px">
<p>Ciao <b><? echo $_SESSION['utente']; ?></b>, mi chiamo Antonino e sarò il tuo istruttore.</br></br>Da dove vogliamo iniziare?</p>
<a href="<? echo $sites; ?>lesson/grooming.php"><div id="3.1"  style="position : absolute; width: 100px; z-index: 2; left: 20px; top: 100px; height:100px" onmouseover="this.style.background='#0066FF'" onmouseout="this.style.background='transparent'" class="centrata"><p><b>Grooming</b></p></div></a>
<a href="<? echo $sites; ?>lesson/so.php"><div id="3.2"  style="position : absolute; width: 100px; z-index: 2; left: 140px; top: 100px; height:100px" onmouseover="this.style.background='#0066FF'" onmouseout="this.style.background='transparent'" class="centrata"><p><b>Salto ostacoli</b></p></div></a>
<a href="<? echo $sites; ?>lesson/dressage.php"><div id="3.3"  style="position : absolute; width: 100px; z-index: 2; left: 260px; top: 100px; height:100px" onmouseover="this.style.background='#0066FF'" onmouseout="this.style.background='transparent'" class="centrata"><p><b>Dressage</b></p></div></a>
<a href="<? echo $sites; ?>lesson/sellaggio.php"><div id="3.4"  style="position : absolute; width: 100px; z-index: 2; left: 380px; top: 100px; height:100px" class="centrata" onmouseover="this.style.background='#FF2277'" onmouseout="this.style.background='transparent'">
<p><b>Sellaggio</b></p></div></a>
<div id="3.5"  style="position : absolute; width: 100px; z-index: 2; left: 500px; top: 100px; height:100px" class="centrata" onmouseover="this.style.background='#FF2277'" onmouseout="this.style.background='transparent'">
<p><b>Girare alla corda</b></p></div>
<div id="3.1.2"  style="position : absolute; width: 100px; z-index: 2; left: 20px; top: 200px; height:100px" class="centrata" onmouseover="this.style.background='#FF2277'" onmouseout="this.style.background='transparent'">
<p><b>Allevamento</b></p></div>
<div id="3.2.2"  style="position : absolute; width: 100px; z-index: 2; left: 140px; top: 200px; height:100px" class="centrata" onmouseover="this.style.background='#FF2277'" onmouseout="this.style.background='transparent'">
<p><b>Alimentazione</b></p></div>
<div id="3.3.2"  style="position : absolute; width: 100px; z-index: 2; left: 260px; top: 200px; height:100px" class="centrata" onmouseover="this.style.background='#FF2277'" onmouseout="this.style.background='transparent'">
<p><b>Regolamenti</b></p></div>
<div id="3.4.2"  style="position : absolute; width: 100px; z-index: 2; left: 380px; top: 200px; height:100px" class="centrata" onmouseover="this.style.background='#FF2277'" onmouseout="this.style.background='transparent'">
<p><b>Anatomia</b></p></div>
<div id="3.5.2"  style="position : absolute; width: 100px; z-index: 2; left: 500px; top: 200px; height:100px" class="centrata" onmouseover="this.style.background='#FF2277'" onmouseout="this.style.background='transparent'">
<p><b>Andature</b></p></div>
</div>

<div id="circleufficio" class="circle"></div>

<div style="position : absolute; z-index:1; left: 170px; top: 250px" >
<img src="<?=$rance;?>benvenuto.jpg" width="1000"/></div>

<? } ?>

<div id="buttonquiz">
<a href ="<? echo $sites; ?>lesson/ex.php">
<input type="button" style=width:500px; class="buttonLV " value="Esercizi pratici"></a><br>
<a href ="<? echo $sites; ?>lesson/test/index.php">
<input type="button" style=width:500px; class="buttonLV " value="QUIZ"></a>
</div>