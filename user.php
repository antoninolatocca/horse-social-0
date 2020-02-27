<?php 
$_GET['ID'] = filter_var($_GET['ID'],FILTER_VALIDATE_INT);
$_GET['page'] = filter_var($_GET['page'],FILTER_VALIDATE_INT); 
if(!empty($_GET)){
 if($_GET['ID']){
 include 'header.php';
 include 'pannello.php';
 include 'rindirizza.php';
 include 'class/SmartImage.class.php';
 $iduser = $_GET['ID'];
 $q1 = mysql_query("SELECT * FROM  utenti WHERE id = '$iduser'");
 if(mysql_num_rows($q1) > 0){
  $row = mysql_fetch_array($q1);
  $name = $row['nome']." ".$row['cognome']; 
  $email = $row['email'];
  $biografia = $row['biografia'];
  $data_nascita = $row['data_nascita'];
  $iscrizione = $row['iscrizione'];
  $sesso = $row['sesso'];
  $state = $row['stato'];
  $path = $sites."utenti/".$iduser."/";
  $sessioneid = $_SESSION['id'];
  if($sessioneid != $iduser){
   $datae = date("d/m/Y H:i:s");
   $visit_utente = mysql_query("SELECT * FROM  visite_profili_utenti WHERE (utente = '$sessioneid', profilo = '$iduser', data = '$datae')");
   if(mysql_num_rows($visit_utente) == 0) {
   $qqVisit= mysql_query("INSERT INTO visite_profili_utenti (utente, profilo, data) VALUES ('$sessioneid', '$iduser', '$datae')");
  }
 }
 $q12 = mysql_query("SELECT * FROM  utenti WHERE id = '$sessioneid'");
 $rowrrr = mysql_fetch_array($q12); 
 $name2 = $rowrrr['nome']." ".$rowrrr['cognome'];
 $idsucc = $iduser + 1;
 $idprec = $iduser - 1;
 $maxid = mysql_query("SELECT MAX(id) AS idmax FROM utenti");
 $arraymaxid = mysql_fetch_array($maxid);
 $id_max = $arraymaxid['idmax']; 
 if($idprec == 0) $visprec = "visibility:hidden;";
 if($_GET['ID'] == $id_max)  $vissucc = "visibility:hidden;";
 echo '<div id="utentisucceprec" style="position:absolute;top:210px;left:880px;"><button type="submit" style="'.$visprec.'" class="defaultbutton" onclick="javascript:window.location.href=\'user.php?ID='.$idprec.'\'" >Utente precedente</button><button type="submit" style="'.$vissucc.'" class="defaultbutton" onclick="javascript:window.location.href=\'user.php?ID='.$idsucc.'\'" >Utente successivo</button></div>';
 echo '<div id="page">';
 echo '<div id="copertinauser" style="background-image: url(utenti/'.$iduser.'/cover.jpg?'.time().'); background-size: cover; background-repeat:no-repeat; background-position:center; background-attachment:scroll;" >';
 if($name2 == $name){ 
  echo '<div style="position:absolute;left:10px;top:10px; heigth:100px;width: 200px"><form action="#" method="post" enctype="multipart/form-data">';
  echo '<input name="foto" type="file"/><input name="upload" type="submit" value="Cambia copertina" style="width: 250px"/></form></div>';
  if(isset($_POST['upload'])) {
   $file = $_FILES["foto"];
   if($file["name"] != ""){
    if($file["error"] == 0){
     $old_name = "utenti/".$id."/cover.jpg";
     if(file_exists($old_name)){
      $Ifoto = 0;
      $path = "utenti/".$id."/immagini/cover/";
      if($handle = opendir($path)){
       $files = "jpg";
       while (false !== ($file = readdir($handle))){
        if($file != '.' && $file != '..') $Ifoto++;
       }
      }
      $Ifoto++;
      $new_name = "utenti/".$id."/immagini/cover/cover_".$Ifoto.".jpg";
      if(rename($old_name, $new_name) == TRUE){
       $img = new SmartImage($file["tmp_name"]);
       $img -> saveImage("utenti/".$id."/cover.jpg"); 
       echo '<script language="javascript">document.location.href="user.php?ID='.$id.'";</script>';
      }
     }else{
      $img = new SmartImage($file["tmp_name"]);
      $img -> saveImage("utenti/".$id."/cover.jpg"); 
      echo '<script language="javascript">document.location.href="user.php?ID='.$id.'";</script>';
     }
    }else echo' <script language="javascript">document.location.href="user.php?ID='.$id.'";</script>';
   }else echo' <script language="javascript">document.location.href="user.php?ID='.$id.'";</script>';
  }
 }
 echo '</div>'; 
 echo '<div id="testate">';
 echo '<div id="profileimgt" class="border">';
 echo '<div class="centrata"><a href="'.$path.'profile.jpg?'.time().'" rel="shadowbox"><img src="'.$path.'profile.jpg?'.time().'"/></a>';
 echo'</div></div>';
 echo '<div id="nomeemail">';
 echo '<p class="userpagename">';
 if($_GET['page'] == 2){
  echo '<a href="user.php?ID='.$iduser.'">'.$name.'</a>';
  echo ' &#x27A2; Foto';
 }elseif($_GET['page'] == 1){
  echo '<a href="user.php?ID='.$iduser.'">'.$name.'</a>';
  echo ' &#x27A2; Post';
 }else echo $name;
 echo'</p><p class="userpageemail"><i>';
 if($name2 != $name) echo '<a href="areamessaggi.php?ref='.$iduser.'">'.$email.'</a>';
 else echo $email;
 echo "</i></p></div></div>";
 $PTQ = mysql_fetch_array(mysql_query("SELECT * FROM  patentiFISE WHERE utente = '$iduser'"));
 if($PTQ){
  $patente = $PTQ['patente'];
  $num = $PTQ['numero'];
  echo '<div id="tesserauserpage"><img width="200px" src="images\tessera.png"><div style="position:absolute; top:80px; width:180px;left:10px;"><p class="centrata">'.$patente.'</p></div><div style="position:absolute; top:5px; width:20px;left:140px;"><p class="centrata" style="text-align:right;"><font size="1">'.$num.'</font></p></div></div>'; }
  if(empty($_GET['page'])){
   include 'script/contafoto.php';
   if($row['vis_gallery'] == 1 && $fotoes123 >= 1){
    echo '<div id="userpagegallery"><h1 class="centrata" style="color:white;margin-bottom:12px;">Foto</h1>';
    echo '<div class="centrata">';
    $path = "utenti/".$iduser."/immagini/foto/";
    if($handle = opendir($path)){
     $i=0;
     $files = array(png, jpg, jpeg, gif);
     while(false !== ($file = readdir($handle)) && $i < 7){
      if($file != '.' && $file != '..'){
       $files = $file;
       echo '<a href="'.$path.$file.'?'.time().'" rel="shadowbox"><img width="170" heigth="170" class="border" alt="'.$file.'" src="'.$path.$file.'?'.time().'" title="'.$file.'" style="margin-right:10px;margin-left:4px;  margin-bottom:10px;"></a>';
      }
      $i++;
     }
    }  
    if($fotoes123 >= 3) echo '<p class="centerwhite" style="font-size:11.5px"><a href="user.php?ID='.$iduser.'&page=2">Vedi tutte le foto</a></p>';
     echo '</div></div>';
    }
    if(!$biografia == ""){
     echo '<div id="userpagebiografia">';
     echo '<div class="centrata" style="width:100%;"><img src="'.$sites.'images/biotext.jpg" width="236" height="77" alt="Biografia"/></div>';
     echo '<p class="testobiografia">'.$biografia.'</p>';
     echo '</div>';
    }
    if($sesso == 'm'){
     $sesso = "Maschile";
     $labelsesso = "Iscritto";
    }elseif($sesso == 'f'){
     $sesso = "Femminile";
     $labelsesso = "Iscritta";
    }
    echo '<div id="userpagedati"><p style="font-size:20px;" class="status">Informazioni:</p>';
    echo '<table width="100%">
    <tr><td width="50%">Nome:</td><td>'.$row[nome].'</td></tr>
    <tr><td>Cognome:</td><td>'.$row[cognome].'</td></tr>
    <tr><td>Email:</td><td>'.$email.'</td></tr><hr>
    <tr><td>'.$labelsesso.' dal:</td><td>'.$row[iscrizione].'</td></tr>';
    if($row[data_nascita] != "0000-00-00"){
     if($row[vis_data] == 1) echo '<tr><td>Nato il:</td><td>'.$row[data_nascita].'</td></tr>';
    }
    if($row[sesso] == 'm'){
     $seX = "Maschile";
    }elseif($row[sesso] == 'f'){
     $seX = "Femminile";
    }
    echo '<tr><td>Sesso:</td><td>'.$seX.'</td></tr>';
    if(isset($row[stato])) if($row[vis_state] == 1) echo '<tr><td>Stato:</td><td>'.ucfirst($row[stato]).'</td></tr>';
    if(isset($row[cell]) || $row[cell] != "") if($row[vis_cell] == 1) echo '<tr><td>Cellulare:</td><td>'.$row[cell].'</td></tr>';
    echo '<tr><td width="50%">Nazionalità:</td><td>'.$row[flag].'</td></tr>';
    echo '</table><hr><br><br><br>';

    // POST anteprima
    $posts = mysql_query("SELECT * FROM  post WHERE visibilità = 'pubblico' AND utente='$iduser' ORDER BY id DESC");
    if(($POSTI = mysql_num_rows($posts)) > 0){
     echo '<p style="font-size:20px;" class="status">Post:</p><hr><div style="margin-top:25px;margin-left:5px;">';
     $i=0;
     while($ups=mysql_fetch_array($posts)){
      if($i < 3){
      $tagpost= $ups['tag'];
      $contenutopost = $ups['post'];
      $datapost = $ups['data'];
      $imgload = $ups['img'];
      echo '<div id="postnarea">'; 
      if($imgload != NULL){
      $immaginer = $sites.'utenti/'.$iduser.'/immagini/post/'.$imgload;
      $post = '<p class="status" style="text-align:justify"><a href="'.$immaginer.'?'.time().'" rel="shadowbox"><img src="'.$immaginer.'" style="vertical-align: top; float:left; margin: 0 10px 10px 0" height="100"></a>'.$contenutopost.'</p>';
     }else $post = '<p class="status">'.$contenutopost.'</p>';
     $profiloURL = $sites.'utenti/'.$iduser.'/profile.jpg?'.time();
     $profiloIMG = '<a href="'.$profiloURL.'" rel="shadowbox"><img style="vertical-align: top; float: left; margin: 0 15px 50px 0" width="50" height="50" border="1" src="'.$profiloURL.'"></a>';
     $userURL = $sites.'user.php?ID='.$utenteidpost;
     if($tagpost != NULL){
      $tagscavalli = mysql_query("SELECT * FROM cavalli WHERE id='$tagpost'");
      $cavallirow=mysql_fetch_array($tagscavalli);
      $nmcavallo = $cavallirow['nome'];
      $HSURL = $sites.'horse.php?horse='.$tagpost.'&page=1';
      $labiel = $name.' </a> &#x27A2; <a href="'.$HSURL.'">'.$nmcavallo.'</a>';
     }else $labiel = $name.'</a>';
     $userLAB = '<label class="status">'.$profiloIMG.'<a href="'.$userURL.'"><b>'.$labiel.'</b></label>';
     echo $userLAB.$post.'<label>'.$datapost.'</label><br>';
     echo '</div>';
     if($imgload != NULL) echo '<br><br>';
    }
    $i++;
   }
   if($POSTI > 3) echo '<br><div style="width:100%"><p class="centerwhite" style="font-size:11.5px"><a href="user.php?ID='.$iduser.'&page=1">Leggi tutti i post</a></p></div>';
   echo '</div><hr>';
  }
  echo '</div>'; 
 }elseif($_GET['page'] == 2){
 include 'script/contafoto.php';
 echo '<div id="userpagegallery2">';
 if($row['vis_gallery'] == 1 && $fotoes123 >= 1){
  $path = "utenti/".$iduser."/immagini/foto/";
  if($handle = opendir($path)){
   $files = array(png, jpg, jpeg, gif);
   while (false !== ($file = readdir($handle))){
    if($file != '.' && $file != '..'){
     $files = $file;
     echo '<a href="'.$path.$file.'?'.time().'" rel="shadowbox"><img width="240" heigth="240" class="border" alt="'.$file.'" src="'.$path.$file.'?'.time().'" title="'.$file.'" style="margin-right:15px; margin-left:15px;margin-bottom:15px;"></a>';
    }
   }
  }  
 }else{
  echo '<script language="javascript">document.location.href="http://hightterabyte.altervista.org/user.php?ID='.$iduser.'";</script>';
 }
 echo '</div>';
 }elseif($_GET['page'] == 1){
  $posts = mysql_query("SELECT * FROM  post WHERE visibilità = 'pubblico' AND utente='$iduser' ORDER BY id DESC");
  if(mysql_num_rows($posts) > 0){
   echo '<div style="left: 50px;position: absolute;top: 450px;width: 1050px;">';
   while($rpsw=mysql_fetch_array($posts)){
    $tagpost= $rpsw['tag'];
    $contenutopost = ($rpsw['post']);
    $datapost = $rpsw['data'];
    echo '<div id="postnarea" style="margin-left:5px">'; 
    $uh = '<a href="'.$sites.'user.php?ID='.$iduser.'">';
    if($tagpost != NULL){
     $tagscavalli = mysql_query("SELECT * FROM cavalli WHERE id='$tagpost'");
     while($cavallirow=mysql_fetch_array($tagscavalli)){
      $nmcavallo = $cavallirow['nome'];
     }
     $tags = ' &#x27A2; <a href="'.$sites.'horse.php?horse='.$tagpost.'&page=1">'.$nmcavallo.'</a>';
     echo '<p class="status"><img style="vertical-align: top; float: left; margin: 0 15px 50px 0" width="50" height="50" border="1" src="'.$sites.'utenti/'.$iduser.'/profile.jpg?'.time().'"><label class="status"><b>'.$name.'</a></b>'.$tags.'</label>'.$contenutopost; } else{
     echo '<p class="status"><img style="vertical-align: top; float: left; margin: 0 15px 50px 0" width="50" height="50" border="1" src="'.$sites.'utenti/'.$iduser.'/profile.jpg?'.time().'"><label class="status"><b>'.$name.'</a></b></label>'.$contenutopost; }
     echo '<br>';
     echo '<b>'.$datapost.'</b></p></div><br><br>'; }
     echo '</div>';
    }else echo '<script language="javascript">document.location.href="http://hightterabyte.altervista.org/user.php?ID='.$iduser.'";</script>';
   }
   if($name2 != $name){
    $controllo_amico = mysql_query("SELECT * FROM amicizie WHERE  id_amico_1='$iduser' AND id_amico_2='$sessioneid' OR id_amico_1='$sessioneid' AND id_amico_2='$iduser'");       
    $controllo = mysql_num_rows($controllo_amico);
    $recuperadati = mysql_query("SELECT * FROM richiesta_amicizia WHERE utente='$iduser' AND richiedente='$sessioneid'");	
    $contarichieste = mysql_num_rows($recuperadati);
    if($controllo == 0){ ?>
    <div id="userpagerichiesta">
    <form method="post">
    <input type="submit" name="aggiungi" class="defaultbutton" style="width: 120px" value="<?php if($contarichieste > 0) echo 'Inviata'; else echo 'Aggiungi' ?>" />
    </form>
    </div></div>
    <?php
   }
   if(isset($_POST['aggiungi'])){
    if($contarichieste == 0){
     $aggiungi=mysql_query("INSERT INTO richiesta_amicizia (utente,richiedente) VALUES ('$iduser','$sessioneid')");           
     ?><script language="javascript">
	 window.alert("Richiesta d'amicizia inviata!");
     function doRefresh(){
      document.location.reload();
     }
     window.setTimeout("doRefresh();" , 1000);
     </script>
     <?php 
    }
   }
  }
 }else{
  ?><script language="javascript">document.location.href="http://hightterabyte.altervista.org/index.php";</script>
  <?php
 }
 }else{
 ?>
 <script language="javascript">document.location.href="http://hightterabyte.altervista.org/index.php";</script>
 <?php
 }
}else{
 ?>
 <script language="javascript">document.location.href="http://hightterabyte.altervista.org/index.php";</script>
 <?php
} 
?>