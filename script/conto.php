<? $conto = 0.00; $conteggio = mysql_query("SELECT * FROM reso WHERE utente = '$id' AND stato = 'confermato'");
while($MFA1 = mysql_fetch_array($conteggio)){
if($MFA1['tipo'] == 'accredito') $conto += $MFA1['valore'];
elseif($MFA1['tipo'] == 'addebito') $conto -= $MFA1['valore']; } 
$conto = number_format($conto, 2, ',' , '.');
?>