<?php
$center = "Centro Equestre La Gabbianella - Melfi (PZ)";
$Menag = mysql_query("SELECT * FROM cavalli WHERE residente = '$center'");
$i = 1;
while($nomeC = mysql_fetch_array($Menag)){
$ccc = $nomeC['id'];
$nmn = $nomeC['nome'];
$photo = 'horses/'.$ccc.'/profile.jpg';
if(file_exists($photo)){
echo '$divAP';
echo '<a href="horse.php?horse='.$ccc.'&page=1"><img  alt="'.$nmn.'" src="'.$photo.'" title="'.$nmn.'" class="border" height="'.$height.'"></a>';
echo '</div>';
$i++;
}
}
?>