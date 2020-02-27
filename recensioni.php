<?php include 'header.php';include 'pannello.php';include 'text.php';include 'button_GE.html';include'script/banner/destra.html';
$pathroom = $sites.'images/recensioni/';

$parte1 = 'Libri';
echo '<div id="recprimacolonna" class="centrata"><p class="centerwhite">'.$parte1.'</p><hr>';
$libri = mysql_query("SELECT * FROM recensioni WHERE tipo = '$parte1'");
while($a = mysql_fetch_array($libri)){
echo '<p class="centerwhite"><b>'.$a[titolo].'</b></p>';
$linka = $pathroom.$a[id].'.png?'.time();
echo '<p style="text-align:justify"><a href="'.$linka.'" rel="shadowbox"><img src="'.$pathroom.$a[id].'.png" style="vertical-align: top; float:left; margin: 0 10px 10px 0" width="80"></a>'.$a[testo].'</p>';
}
echo '</div>';

$parte2 = 'Riviste';
echo '<div id="recsecondacolonna"><p class="centerwhite">'.$parte2.'</p><hr>';
$riviste = mysql_query("SELECT * FROM recensioni WHERE tipo = '$parte2'");
while($b = mysql_fetch_array($riviste)){
echo '<p class="centerwhite"><b>'.$b[titolo].'</b></p>';
$linkb = $pathroom.$b[id].'.png?'.time();
echo '<p style="text-align:justify"><a href="'.$linkb.'" rel="shadowbox"><img src="'.$pathroom.$b[id].'.png" style="vertical-align: top; float:left; margin: 0 10px 10px 0" width="80"></a>'.$b[testo].'</p><br><br>';
}
echo '</div>';

$parte3 = 'Films';
echo '<div id="recterzacolonna"><p class="centerwhite">'.$parte3.'</p><hr>';
$films = mysql_query("SELECT * FROM recensioni WHERE tipo = '$parte3'");
while($c = mysql_fetch_array($films)){
echo '<p class="centerwhite"><b>'.$c[titolo].'</b></p>';
$linkc = $pathroom.$c[id].'.png?'.time();
echo '<p style="text-align:justify"><a href="'.$linkc.'" rel="shadowbox"><img src="'.$pathroom.$c[id].'.png" style="vertical-align: top; float:left; margin: 0 10px 10px 0" width="80"></a>'.$c[testo].'</p>';
}
echo '</div>';
?>