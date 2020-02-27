$eventi = 0;
$datenow = date("Y-m-d");
$SELECT = mysql_query("SELECT * FROM eventi WHERE data >= '$datenow'");
while($ay=mysql_fetch_array($SELECT)){
if($ay[0] >= $datenow){
$invitati = $ay['invitati'];
$arrayinviti = explode(' ', $invitati);
if(in_array($id, $arrayinviti)){
$eventi++;
}
}}