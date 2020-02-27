<?php
$num_cv = mysql_num_rows(mysql_query("SELECT * FROM cavalli WHERE residente = '$center'"));
$num_ev = mysql_num_rows(mysql_query("SELECT * FROM eventi WHERE luogo = '$place'"));
$gellery = $num_cv;
echo '<div id="AreaMenu"><ul id="iMenu">';
echo '<a href="'.$sites.'maneggio.php?ID='.$center.'&P=1"><li>Home</li></a>';
if(file_exists('maneggi/'.$center.'/contatti.php')) echo '<a href="'.$sites.'maneggio.php?ID='.$center.'&P=3"><li>Contatti</li></a>';
if($num_ev > 0) echo '<a href="'.$sites.'maneggio.php?ID='.$center.'&P=4"><li>Eventi ('.$AftE.')<li></a>';
echo '</ul>';
if($gellery > 0) echo '<p style="color:white">Animali</p><hr><ul id="iMenu">';
if($num_cv > 0) echo'<a href="'.$sites.'maneggio.php?ID='.$center.'&P=2"><li>Cavalli ('.$num_cv.')</li></a></ul>'; 
?>

<br><br><div class="centrata">
<script type="text/javascript">
/* <![CDATA[ */
document.write('<s'+'cript type="text/javascript" src="http://ad.altervista.org/js.ad/size=120X600/r='+new Date().getTime()+'"><\/s'+'cript>');
/* ]]> */
</script>
</div></div>