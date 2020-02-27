<?php 
include 'header.php';
include 'pannello.php';
include 'text.php';
include 'button_GE.html';
include 'rindirizza.php';
echo '<div style="position : absolute; width: 180px; left: 950px; top: 270px; height:36px; z-index:2;" class="backblue">
<p style="font-size:12px"><b>Inizia adesso</b></p>
<div id="layer2" style="position : absolute; width: 80px; left: 100px; top:0">
<a href="'.$sites.'lesson/start.php"><input type="button" style="width:80px;" class="buttonLV " value="Via!"></a>
</div>
</div>
<div style="position:absolute; left:170px; top:250px">
<img src="'.$sites.'maneggi/2/rance/benvenuto.jpg" width="1000"/>
</div>';
?>