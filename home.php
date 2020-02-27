<div id="W100" style="top:200px; height:25%" class="centrata">
<a href="http://hightterabyte.altervista.org/index.php">
<img src="http://hightterabyte.altervista.org/images/HS/HS_200.png" alt="Horse Social logo" style="height:100%"/>
</a>
</div>

<div id="Benvenuti" class="centrata">
<img src="images/benvenuto.gif" alt="Benvenuti">
<!--<h1 style="color:#FFF"><b>Benvenuti</b> su <b>Horse Social</b></h1>-->
</div>

<div id="div1">
<p class="page">Per rendere più mozzafiato l'esperienza con il nostro sito, i nostri servizi sono pronti ad offrirti un vero e proprio business; al momento dell'iscrizione viene aperto un conto virtuale, sul quale inizierete subito ad accumulare credito.</p>
</div>
<div id="div2">
<p class="page">Dalla vasta produzione editoriale di <i>Antonino Latocca</i>, libri dedicati al mondo equestre, è nata l'idea di mettere a punto un vero e proprio store di libri. Oltre ai libri, uno speciale primo piano è dedicato alle edizioni del giornalino <i>Il Gabbiano</i>.</p>
</div>
<div id="div3">
<p class="page">Alcuni anni fa nacque un'idea: un giornalino che raccontasse degli eventi speciali a cui il <i>Centro Equestre La Gabbianella</i> partecipava. Era un giornalino che andava distribuito solo nella scuderia. Tutte le uscite sono disponibili sul nostro store.</p>
</div>
<div id="div4">
<p class="page">Con il sistema per gli utenti, tutti possono iscriversi <strong>gratuitamente</strong> ed accedere a numerosi servizi dedicati. La registrazione è molto semplice, basta scegliere un <i>username</i>, una <i>password</i> e inserire una <i>e-mail</i> valida, utile per la conferma dei dati. </p>
</div>
<div id="div5">
<p class="page">Le <i>lezioni virtuali</i> consistere in video illustrativi, con tanti contenuti speciali, come ad esempio manuali, presentazioni, contenuti audio, foto e tantissimi media. Tutto senza trascurare l'interattività, come ad esempio poter fare domande all'istruttore, oppure fare i quiz. Tutto comodamente da qualunque postazione connessa ad internet, ovunque vi troviate.</p>
</div>

<div id="slideHOME">
<hr><hr>
</div>

<?php 
$_GET['ref'] = filter_var($_GET['ref'],FILTER_VALIDATE_INT); 
if(isset($_SESSION['utente'])){ ?>
<script language="javascript">document.location.href="index.php";</script>
<?php }else{ ?>
<div style="position: absolute; top:40px; left:77%; width:215px" class="backblue">
<div class="centrata"><label class="etichetta">Accedi</label></div>
<form method="post" action="#" id="formlogin">
<label for="emaillog" style="margin-left:5px;">E-mail:</label>
<div class="centrata"><input type="text" name="emaillog" id="emaillog"  class="inputs" placeholder="E-mail"/></div>
<label for="passwordlog" style="margin-left:5px;">Password:</label>
<div class="centrata"><input type="password" name="passwordlog" id="passwordlog" class="inputs" placeholder="Password"/>
<label><a href="http://hightterabyte.altervista.org/rcpass.php">Hai dimenticato la password?</a></label></div>
<div class="centrata"><input type="submit" style="width: 100px;margin-top:10px;" class="defaultbutton" name="invia" id="login" value="Accedi" /></div>
</form>
</div>
<?php }
if($_GET['ref'] != 1 && isset($_POST['invia'])){
$emaillog = mysql_real_escape_string($_POST['emaillog']);
$passwordlog = mysql_real_escape_string($_POST['passwordlog']);
if($emaillog == "" || $passwordlog == ""){
?><script language="javascript">
window.alert("Devi compilare tutti i campi");
document.location.href="index.php";
</script><?
}else{ 					
$password_cript = md5($passwordlog);
$recuperadati = mysql_query("SELECT * FROM utenti WHERE email = '$emaillog' AND password = '$password_cript'");
$verificadati = mysql_num_rows($recuperadati);
if($verificadati == 1){
$sessione = mysql_fetch_array($recuperadati);
$_SESSION['utente'] = $sessione['nome']." ".$sessione['cognome'];
$_SESSION['id'] = $sessione['id'];
$_SESSION['email'] = $sessione['email'];
$_SESSION['messaggi'] = $sessione['messaggi'];
$_SESSION['richieste'] = $sessione['richieste'];
$_SESSION['sex'] = $sessione['sesso'];
$_SESSION['cell'] = $sessione['cell'];
$_SESSION['nome'] = $sessione['nome'];
$_SESSION['cognome'] =  $sessione['cognome'];
$id=$_SESSION['id'];
$IP = $_SERVER["REMOTE_ADDR"];
$datenow = date("d/m/Y H:i:s");
$AgLog = mysql_query("UPDATE utenti SET IP='$IP', login='$datenow', online=1 WHERE id='$id'"); ?>
<script language="javascript">document.location.href="index.php";</script>
<?php } elseif($verificadati == 0) {
$recuperadati2 = mysql_query("SELECT * FROM utenti_temp WHERE email = '$emaillog' AND password = '$passwordlog'");
$verificadati2 = mysql_num_rows($recuperadati2);
if($verificadati2 == 1){ ?>
<script language="javascript">
window.alert("Iscrizione incompleta" + '\n' + "Controlla la tua posta elettronica e clicca sul link che ti è stato inviato!");
</script><? } else { ?><script language="javascript">
window.alert("E-mail o password non corretta!");
document.location.href="index.php";
</script>
<? } } } }
if( $_GET['ref'] == 1 && !isset($_SESSION['utente'])) { ?>
<div style="position:absolute; left:0; top:30px; width:100%; height:100%; background-color:#FFF; opacity:0.7;"></div>
<div class="backblue" style="position:absolute; left:33%; top:18%; width:435px;">
<?php
if(!isset($_GET['passkey'])){
if(!isset($_POST['invia'])){ ?>
<div class="centrata"><label class="etichetta"">Registrati, e' GRATIS!</label></div>
<form method="post" action="#" id="formregistrazione">
<br><table><tr><td><label for="nome">Nome:</label></td><td><label for="cognome">Cognome:</label></td></tr>
<tr><td><input type="text" name="nome" id="nome" /></td><td><input type="text" name="cognome" id="cognome" /></td></tr>
<tr><td><label for="sesso">Sesso:</label></td></tr>
<tr><td><select name="sesso" style="width:212px;height:22px;margin-bottom:10px"></option><option value="maschio" selected>Maschio</option><option value="femmina">Femmina</option></select></td></tr>
<tr><td><label for="email">E-mail:</label></td><td><label for="email2">Controlla e-mail:</label></td></tr>
<tr><td><input type="text" name="email" id="email" /></td><td><input type="text" name="email2" id="email2" /></td></tr>
<tr><td><label for="password1">Password:</label></td><td><label for="password2">Ripeti Password:</label></td></tr>
<tr><td><input type="password" name="password1" id="password1"/></td><td><input type="password" name="password2" id="password2"/></td></tr>
<tr><td><label>Codice di sicurezza:</label></td><td><label>Scrivi il codice di sicurezza:</label></td></tr>
<tr><td><img src="http://hightterabyte.altervista.org/captcha/captcha.php"></td><td><input type="text" name="captcha" id="captcha"/></td></tr>
</table>
<br><div class="centrata"><label>*Tutti i campi sono obbligatori</label><input type="submit" style="width: 100px;" name="invia" id="registrati" class="defaultbutton" value="Registrati" /></div>
</form>
<?php } else {
    $buttonback = '<div class="centrata"><a href="index.php?ref=1"><input type="button" class="defaultbutton" style="background-color:#3F4954; width:100px; height:35px;" value="Indietro"></a></div>';
    $codiceconferma = md5(uniqid(rand()));
    $nome = mysql_real_escape_string($_POST['nome']);
    $cognome =  mysql_real_escape_string($_POST['cognome']);
    $password1 = mysql_real_escape_string($_POST['password1']);
    $password2 = mysql_real_escape_string($_POST['password2']);
    $email = mysql_real_escape_string($_POST['email']);
    $email2 = mysql_real_escape_string($_POST['email2']);
    $captcha = mysql_real_escape_string($_POST['captcha']);
    $sesso = $_POST['sesso'];
    if($nome == ""  || $email == "" || $cognome == "" || $sesso == "" || $captcha == "" || $password1 == "" || $password2 == ""){
        echo "<p>Devi riempire tutti i campi</p>".$buttonback;
    }elseif($password2 != $password1){
        echo "<p>Le password devono coincidere</p>".$buttonback;
    }elseif($email != $email2){
        echo "<p>Gli indirizzi email non corrispondono</p>".$buttonback;
    }elseif($_SESSION['captcha'] != $captcha) {
        echo "<p>Il codice di sicurezza inserito non corrisponde. Ricontrollare.</p>".$buttonback;
    }elseif($nome == $cognome){
        echo "<p class='status'>Il Nome e il Cognome devono essere diversi!</p>".$buttonback;
    }elseif($nome == $password1){
        echo "<p>Il Nome e la password devono essere diversi!</p>".$buttonback;
    }elseif($nome == $password2){
        echo "<p>Il Nome e la password devono essere diversi!</p>".$buttonback;
    }else{
        $recuperauseremail = mysql_query("SELECT id FROM utenti WHERE email='$email'");
        $contausermail = mysql_num_rows($recuperauseremail);
        if($contausermail > 0){
            echo "<p>E-mail gi&#224 registrata</p>".$buttonback;
        } else {
            if($_POST['sesso'] == "Femmina"){
                $sesso = "f";
            }elseif($_POST['sesso'] == "Maschio"){
                $sesso = "m";
            }
            $datato = date("Y-m-d");
            $inviautentitemp = mysql_query("INSERT INTO utenti_temp (codiceconferma, nome, cognome, password, email, sesso, datato) VALUES ('$codiceconferma', '$nome', '$cognome', '$password2', '$email', '$sesso', '$datato')");
            if($inviautentitemp){
                $to=$email;
                $subject="Conferma Registrazione";
                $header="Da: Horse Social";
                $message="Ecco il tuo codice di attivazione \r\n";
                $message.="Clicca sul link per confermare la registrazione \r\n";
                $message.="http://hightterabyte.altervista.org/index.php?ref=1&passkey=$codiceconferma";
                $sentmail=mail($to,$subject,$message,$header);
            }
            if($sentmail){
echo '<div class="centrata"><p class="status"><b>Grazie per esserti registrato. Per completare fai click sul link che ti abbiamo inviato al tuo indirizzo di posta elettronica. <br>L\'email potrebbe essere considerata come spam.</b></p><a href="cambiaemail.php?passkey='.$codiceconferma.'">Non riesci ad accedere all\'email?</a></div>';
  }else{
echo "<p class='status'>Errore, E-mail non inviata.</p>";
} } } } } else {
        $passkey = $_GET['passkey'];
        $risultatouser = mysql_query("SELECT * FROM utenti_temp WHERE codiceconferma = '$passkey'");
        if($risultatouser) {
            $contauser = mysql_num_rows($risultatouser);
            if($contauser == 1){
                $rows = mysql_fetch_array($risultatouser);
                $nome = $rows['nome'];
                $cognome = $rows['cognome'];
                $email = $rows['email'];
                $password = $rows ['password'];
                $registrazioneDT = date("Y-m-d");
                $sesso = $rows['sesso'];
                $passwordcript = md5($password);
                $sqlconfermauser = mysql_query("INSERT INTO utenti (iscrizione, nome, cognome, password, email, sesso) VALUES ('$registrazioneDT', '$nome','$cognome', '$passwordcript', '$email','$sesso')");
                    if ($sqlconfermauser) {
                    $sid = mysql_query("SELECT id FROM utenti WHERE email = '$email'");
                    $rowidmail = mysql_fetch_array($sid);
                    $id = $rowidmail[0];
                    $error = "<p class='status'>Errore nella creazione della cartella";
                    $nms = "Segnala il problema o riprova più tardi</p>";
                    $ST_profilo = './utenti/'.$id.'/immagini/profilo/';
                    if (!mkdir($ST_profilo, 0, true)) {
                        die($error.' profilo. '.$nms);
                    }
                    $ST_copertina = './utenti/'.$id.'/immagini/cover/';
                    if (!mkdir($ST_copertina, 0, true)) {
                        die($error.' copertina. '.$nms);
                    }
                    $ST_foto = './utenti/'.$id.'/immagini/foto/';
                    if (!mkdir($ST_foto, 0, true)) {
                        die($error.' copertina. '.$nms);
                    }
                    $ST_post = './utenti/'.$id.'/immagini/post/';
                    if (!mkdir($ST_post, 0, true)) {
                        die($error.' post. '.$nms);
                    }
                    $newpathimg = 'utenti/'.$id.'/';
                    if($sesso == 'f') {
                        $filename = 'girl.jpg';
                        $estensione = '.jpg'; 
                    } elseif($sesso == 'm') {
                        $filename = 'man.jpg';
                        $estensione = '.jpg'; 
                    }
                    $name = 'profile'.$estensione;
                    $pathimg = 'images/'.$filename;
                    if(copy($pathimg, $newpathimg . $name)) {

                   $sqleliminadati = mysql_query("DELETE FROM utenti_temp WHERE codiceconferma = '$passkey'");
                    echo '<p>Account creato con successo!</p>';
                    $ptxt = $nome.' '.$cognome.' si è appena iscritto a Horse Social';
                    $newuser = mysql_query("INSERT INTO post (utente,data,post) VALUES ('$id','$registrazioneDT','$ptxt')");
} } else {
echo "Errore!";
} } } } echo '</div>'; }?>