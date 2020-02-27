<div id="Photo" style="position: absolute; width: 950px; left: 180px; top: 250px">
<p class="utente">Cavalli</p><hr width=980px size=2 color=#D3D3D3>
<?php
$height = 192;
$Menag = mysql_query("SELECT * FROM cavalli WHERE residente = '$center'");
$i = 1;
while($nomeC = mysql_fetch_array($Menag)){
$ccc = $nomeC['id'];
$nmn = $nomeC['nome'];
$photo = 'horses/'.$ccc.'/profile.jpg';
if(file_exists($photo)){
echo '<div id="Gall'.$i.'" class="centrata"><a href="horse.php?horse='.$ccc.'&page=1"><img  alt="'.$nmn.'" src="'.$photo.'" title="'.$nmn.'" class="border" height="'.$height.'"></a></div>';$i++;}}?>
</div>
<?php include $sites.'maneggi/'.$center.'/album.php'; ?>