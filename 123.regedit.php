<?php
include 'header.php';
?>
<div style="position:absolute; top:250px; left:2%; background-color:#000; width:98%; padding: 5px;">
<p class="centerwhite">Registro di amministrazione</p>

<?php
if(isset($_SESSION['utente'])){ 
 if($_SESSION['id'] == 1 || $_SESSION['id'] == 6){
    
  echo '<p class="commandline">Scegliere operazione_</br></p>';
  echo '<form method="POST" action="#" name="esegui" style="text-align:center;"><p class="commandline"><select name="comando">';
  echo '<option selected value"SELECT">SELECT</option>';
  echo '<option value"UPDATE">UPDATE</option>';
  echo '<option value"DELETE">DELETE</option></select>';
  echo ' FROM <select name="tabella">';
  $DBname = 'my_hightterabyte';
  $tabelle = mysql_query("SHOW TABLES FROM $DBname");
  while($row = mysql_fetch_row($tabelle)){
   echo '<option value"'.$row[0].'"';
   $azione = $_GET['acthion'];
   if($row[0] == "utenti"){
   if($azione == "0" || $azione == "1") echo 'selected';
   }
   echo'>'.$row[0].'</option>';
  }
  echo '</select> VALUE <input type="text" name="valore"><input type="submit" value="esegui"> OR <a href="http://www125.altervista.org/phpmyadmin/index.php" target="_blank">Vai al Database</a></p></form>';
  
  if(isset($_GET['acthion'])){
   echo '<p class="commandline"><a href="'.$sites.'123.regedit.php"><< Trona indietro</a></p>';
   $azione = $_GET['acthion'];
   if($azione == 0){
    echo '<p class="commandline">Invia una e-mail agli utenti registrati<br>---------------------------------------------<br>';
    $idmail = mysql_query("SELECT * FROM utenti");
    while($fr = mysql_fetch_array($idmail)){
     $dataD = date("Y-m-d");
     $insc = $fr[4];
     $bborn = $fr[7];
     if($insc == "0000-00-00"){
      $dataD1 = '<i>'.$insc.'</i>';
     }elseif($insc == $dataD){
      $dataD1 = '<b>'.$insc.'</b>';
     }else{
      $dataD1 = $insc;
     }
     if($bborn == "0000-00-00" OR strpos($bborn, "00") > 4){
      $dataD2 = '<i>'.$bborn.'</i>';
     }elseif($bborn == $dataD){
      $dataD2 = '<b>'.$bborn.'</b>';
     }else{
      $dataD2 = $bborn;
     }
     $fin = $dataD2.' | '.$dataD1;
     echo '<input type="checkbox" name="'.$fr1[0].'" value=""/>'.$fr[0].'| <a style="text-decoration:none;" href="'.$sites.'user.php?ID='.$fr[0].'" target="_blank">'.strtoupper($fr[3]).' '.ucwords($fr[2]).'</a> | <a href="mailto:'.$fr[6].'">'.$fr[6].'</a> | '.$fin.'</br>';
    }
    echo '---------------------------------------------</p>';
   }elseif($azione == 1){
    echo '<p class="commandline">Invia una e-mail agli utenti che devono confermare la registrazione<br>---------------------------------------------<br>';
    $idmail_t = mysql_query("SELECT * FROM utenti_temp");
    while($fr1 = mysql_fetch_array($idmail_t)){
     echo '<input type="checkbox" name="'.$fr1[0].'" value=""/>'.$fr1[0].' | <a href="mailto:'.$fr1[2].'">'.$fr1[2].'</a> | '.$fr1[6].'</br>';
     $link = $sites.'register.php?passkey='.$fr1[0];
     echo $link.'</br>';
    }
    echo '---------------------------------------------</p>';
   }
  }else{
   echo '<p class="commandline">---------------------------------------------<br>Azioni<br>---------------------------------------------<br><a href="'.$sites.'123.regedit.php?acthion=0">Invia una e-mail agli utenti registrati</a><br><a href="'.$sites.'123.regedit.php?acthion=1">Invia una e-mail agli utenti_temp</a><br>Crea un nuovo evento<br>---------------------------------------------';
   echo '</p>';
  }

 }
}else{
?>

<?php
}
?>

</div>