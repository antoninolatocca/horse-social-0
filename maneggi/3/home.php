<div style="position: absolute;width:500px;left:750px;top:280px" class="centrata">
<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?f=q&amp;source=s_q&amp;hl=it&amp;geocode=&amp;q=Via+Dolomiti,+6,+Policoro+MT&amp;sll=41.442726,12.392578&amp;sspn=10.340702,19.753418&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Via+Dolomiti,+6,+Policoro,+Matera,+Basilicata&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
<br><br>
<iframe width="400" height="180" scrolling="no" frameborder="no" noresize="noresize" src="http://www.ilmeteo.it/box/previsioni.php?citta=5351&type=day1&width=400&ico=5&lang=ita&days=6&font=Arial&fontsize=12&bg=FFFFFF&fg=000000&bgtitle=0099FF&fgtitle=FFFFFF&bgtab=F0F0F0&fglink=1773C2"></iframe>
</div>

<div style="position:absolute;left:220px;top:280px;width:500px;">
<?php
$com = mysql_fetch_array(mysql_query("SELECT * FROM maneggi WHERE id = '$center'"));
echo '<H1 class="centerwhite"><img src="'.$sites.'maneggi/'.$center.'/logo.png" width="100" style="vertical-align: top; float:left; margin: 0 10px 0 0">'.$com[nome].'</H1>';
?>
</div>