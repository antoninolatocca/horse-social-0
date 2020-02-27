<?php 
if(isset($_SESSION['utente'])) {

/*
echo '<script type="text/javascript"> 
        var seconds = 10; 
        setTimeout("reload()", seconds*1000); 
      </script>';
*/

    $data =  time(); 
    $query = "UPDATE utenti SET controlloffline = '$data' WHERE id='$id'"; 
    $result = mysql_query($query); 
    $selectcontrollo = mysql_query("SELECT * FROM utenti WHERE id='$id'");
    $arraycontrollo = mysql_fetch_array($selectcontrollo);
    if($data - 10 > $arraycontrollo['controlloffline'] ){
    $off = mysql_query("UPDATE utenti SET online = '0' WHERE id='$id'");
    }
}
?>