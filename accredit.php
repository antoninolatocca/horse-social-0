<?php include 'header.php'; include 'pannello.php'; include 'text.php';
$_GET['ID'] = filter_var($_GET['ID'],FILTER_VALIDATE_INT); 
 if(empty($_GET)){
        header('location: index.php');
      } else {
          if($_GET["ID"] != ""){
            $ip = $_SERVER["REMOTE_ADDR"];
            $id = $_GET["ID"];
		$recuperauseremail = mysql_query("SELECT id FROM access_ip WHERE ip='$ip'");	
		$contaip = mysql_num_rows($recuperauseremail);
if($contaip == 0){
$select = mysql_query("SELECT conto FROM utenti WHERE id = '$id'");
 $row = mysql_fetch_array($select);
 $conto = $row['0'];
$valore = 0.25;
$accredito = $conto + $valore;
$update = mysql_query("UPDATE utenti SET conto = '$accredito' WHERE id='$id'");
$date = date("Y-m-d");
$registroIP = mysql_query("INSERT INTO access_ip (ip, date) VALUES ('$ip', '$date')");
 ?><script language="javascript">
 document.location.href="register.php";
 </script>
<? } } } ?>