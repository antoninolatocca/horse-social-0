<?php
include 'header.php';
echo '<div id="wap">
<ul id="supermenu">
<li><a href="'.sites.'index.php"><img src="'.$sites.'images/HS/HS_30.png" alt="logo"/>Home</a></li>';
echo '<li><a href="'.$sites.'ufficio.php">Redazione</a>
	<ul>
    <li><a href="'.$sites.'"articoli.php">Articoli</a></li>
    <li><a href="'.$sites.'"store.php">Store</a></li>
    <li><a href="'.$sites.'"ufficio.php">Ufficio</a></li>
    </ul>
    </li>
<li><a href="'.$sites.'"maneggio.php?ID=2&P=1">Circoli Ippici</a>';
$center = mysql_query("SELECT * FROM maneggi");
echo '<ul>';
if (mysql_num_rows($center) > 0){
	while($row = mysql_fetch_array($center)){
    	echo '<li><a href="'.$sites.$row[1].'index.php">'.$row[1].'</a></li>';
    }
}
echo '<li><a href="'.$sites.'nuovo.php"> + Aggiungi il tuo maneggio</a></li></ul></li>';
echo '<li><a href="'.$sites.'extra.php">Altri contenuti</a>
	<ul>
    <li><a href="'.$sites.'annunci.php">Annunci</a></li>
    <li><a href="'.$sites.'answer.php">Answer</a></li>
    <li><a href="'.$sites.'denunce.php">Denunce</a></li>
    <li><a href="'.$sites.'extra.php">Lezioni</a></li>
    <li><a href="'.$sites.'recensionu">Recensioni</a></li>
    </ul></li>
<li><a href="'.$sites.'info.php">Informativa</a></li>
<li><a href="'.$sites.'123.regedit.php">Registro</a></li>
</ul></div>';
?>