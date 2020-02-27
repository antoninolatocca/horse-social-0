<?php include 'header.php'; ?>
<div id="bunner" style="position: absolute; left: 5px; top: 40px"><script type="text/javascript">
/* <![CDATA[ */document.write('<s'+'cript type="text/javascript" src="http://ad.altervista.org/js.ad/size=300X250/r='+new Date().getTime()+'"><\/s'+'cript>');
/* ]]> */</script></div>
<div class="centrata"><div id="wrapper" style="position: absolute; top: 250px; left:500px; width:210px" class="backblue">
<?php if(!isset($_GET['passkey'])){
  if(!isset($_POST['invia'])){ ?>
  <div class="centrata"><font size="6" style="color:white;"><b>Recupera</b></font></div><br>
  <form method="post" action="#" id="recupera"><label for="email">Email:</label>
  <input type="text" name="email" id="email" /><br>
  <input type="submit" style="width: 100px" class="defaultbutton" name="invia" id="registrati" value="Recupera" />
  </form>
  <?php }else{
  $codiceconferma = md5(uniqid(rand()));
  $email = mysql_real_escape_string($_POST['email']);
    if($email == ""){
    echo "Inserisci un indirizzo e-mail";                                        
    }elseif(strpos($email,"@") === FALSE){
    echo 'E-mail non valida. L\'indirizzo email inserito deve contenere la chiocciola "@"';
    }else{
    $recuperauseremail = mysql_query("SELECT id FROM utenti WHERE email='$email'");
    $contausermail = mysql_num_rows($recuperauseremail);
      if($contausermail > 0){
      $passwordresetdate = mysql_query("INSERT INTO password (id,email,passkey) VALUES ('$recuperauseremail','$email','$codiceconferma')");
        if($passwordresetdate){
        $to=$email;
        $subject="Recupera password";
        $header="Da: Hightterabyte";
        $message="Ecco il tuo codice link \r\n";
        $message.="Clicca sul link per reimpostare la password \r\n";
        $message.= $sites."rcpass.php?passkey=$codiceconferma";
        $sentmail=mail($to,$subject,$message,$header);
        }					
        if($sentmail){ 
        echo '<p>Ti abbiamo inviato una email (potrebbe essere nella casella spam) con il link per reimpostare la password</p>';
        }else{
        echo "Errore, e-mail non inviata.";
        }
      }
    }
  }
}else{	
$passkey = $_GET['passkey'];
$email = mysql_query("SELECT  email FROM  password WHERE  passkey = '$passkey'");
$row = mysql_fetch_array($email);
$mail = $row['0']; ?>
<div class="centrata"><font size="6" style="color:white;"><b>Reimposta</b></font></div><br>
<form method="POST" action="#" id="reset" name="reset">
<label for="email">E-mail</label>
<input type="text" name="email" id="email" value=<?php echo $mail ?> /><br>
<label for="password">Nuova password</label>
<input type="password" name="password1" id="password1" /><br>
<label for="password">Riscrivi password</label>
<input type="password" name="password2" id="password2" /><br>
<input type="submit" name="reset" class="defaultbutton" id="reset" value="Reimposta" />
</form>
<?php
  if(isset($_POST['reset'])){
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];
  $email = $_POST['email'];
    if($password1 != $password2) {
    echo '<p>Le password devono coincidere</p>';
    }elseif($password1 == "" || $password2 == "" || $email == "" || $passkey == ""){
    echo '<p>Errore compilare tutti i campi</p>';
    }else{ 
    $sqldeletedate = mysql_query("DELETE FROM password WHERE passkey = '$passkey'");
    $password = md5($password1);
    $query=mysql_query("UPDATE utenti SET password='$password' WHERE email='$email'");
      if($query == TRUE) { ?>
      <script language="javascript">window.alert("Password cambiata con successo!");document.location.href="index.php";</script>
      <?php }else{ 
      echo '<p>Errore nel salvataggio della nuova password</p>'; 
      }
    } 
  } 
} ?></div></div>