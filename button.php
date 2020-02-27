<div id="AreaMenu">
<?php
include 'rindirizza.php';
include 'script/contafoto.php';
include 'script/contaeventi.php';
include 'script/contadoc.php';
?>
<ul id="iMenu">
<a href="index.php"><li>Home</li></a>
<a href="areamessaggi.php"><li>Messaggi <?php if($Nmsg > 0) echo '('.$Nmsg.')' ?></li></a>
<a href="areaprofilo.php"><li>Profilo</li></a>
<a href="areaamici.php"><li>Amici <?php if($amiciNUM > 0) echo '('.$amiciNUM.')' ?></li></a>
<a href="areaeventi.php"><li>Calendario <? if($eventi > 0) echo '('.$eventi.')' ?></li></a>
<a href="areagalleria.php"><li>Galleria <? if($fotoes > 0) echo '('.$fotoes.')' ?></li></a>
<a href="arealibreria.php"><li>Libreria <? if($macs > 0) echo '('.$macs.')' ?></li></a>
<?php
$bauletti = mysql_num_rows(mysql_query("SELECT * FROM bauletti WHERE utente ='$id'"));
if($bauletti > 0) echo '<a href="areabauletto.php"><li>Bauletto ('.$bauletti.')</li></a>';
?>
<a href="resoconto.php"><li>Resoconto</li></a>
</ul>

<br><br><div class="centrata">
<script type="text/javascript">
/* <![CDATA[ */
document.write('<s'+'cript type="text/javascript" src="http://ad.altervista.org/js.ad/size=120X600/r='+new Date().getTime()+'"><\/s'+'cript>');
/* ]]> */
</script>
</div></div>