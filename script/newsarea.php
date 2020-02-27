<?php

$posts = mysql_query("SELECT * FROM  post WHERE privacy = 'pubblico' ORDER BY id DESC");
if(mysql_num_rows($posts) > 0){
 while($mfa = mysql_fetch_array($posts)){
 ("SELECT * FROM  post WHERE privacy = 'pubblico' ORDER BY id DESC");
  $id_p = $mfa['id'];
  $user_p = $mfa['utente'];
  $date_p = $mfa['data'];
  $privacy_p = $$mfa['privacy'];
  $text_p = $mfa['post'];
  $img_p = $mfa['img'];
  $tag_p = $mfa['tag'];
  
  echo '<div id="postnarea" style="margin-left:5px">';
  
  $utenti = mysql_query("SELECT nome, cognome FROM utenti WHERE id='$user_p'");
  $mfa_u = mysql_fetch_array($utenti);
  $utent = $mfa_u['nome'].' '.$mfa_u['cognome'];
  $label = '<a href="'.$sites.'user.php?ID='.$user_p.'">'.$utent.'</a>';
  
  if($tag_p != NULL){
   $cavalli = mysql_query("SELECT nome FROM cavalli WHERE id='$tag_p'");
   $mfa_c = mysql_fetch_array($cavalli);
   $cavallo = $mfa_c['nome'];
   $label = $label.' &#x27A2; <a href="'.$sites.'horse.php?horse='.$tag_p.'&page=1">'.$cavallo.'</a>';
  }

  echo '<p class="status"><a href="'.$sites.'utenti/'.$user_p.'/profile.jpg?'.time().'" rel="shadowbox"><img style="vertical-align: top; float: left; margin: 0 15px 50px 0" width="50" height="50" border="1" src="'.$sites.'utenti/'.$user_p.'/profile.jpg?'.time().'"></a><label class="status">'.$label.'</label></p>';
  
  if($img_p != NULL){
   if(substr($img_p, 0, 1) == "#"){
    $URLi = $sites.str_replace("#","store/",$img_p);
    $text_p = $text_p.'<br><br><a href="'.$sites.'store.php"><input type="submit" name="invia" value="Vai allo store" class="defaultbutton"/></a>';
   }else{
    $URLi = $sites.'utenti/'.$user_p.'/immagini/post/'.$img_p;
   }
   echo '<div style="width:100%; height:160px;"><a href="'.$URLi.'" rel="shadowbox"><img src="'.$URLi.'" height="150" style="float:left; margin:5px 10px 5px 0;"></a><div style="overflow:scroll; height:100%"><p class="status">'.$text_p.'</p></div></div><br>';
  }else echo '<p class="status">'.$text_p.'</p>';
  
  $piu = 0;
  $meno = 0;
  $likke = mysql_query("SELECT * FROM  votazioni_post WHERE post = '$id_p'");
  if($voti = mysql_num_rows($likke) > 0){
  	while($utentivotanti = mysql_fetch_array($likke)){
    	if($utentivotanti['tipo'] == 1){
        $piu++;
        }elseif($utentivotanti['tipo'] == 2){
        $meno++;
        }
    	if($utentivotanti['utente'] == $id){
        	$votodato = $utentivotanti['tipo'];
        }
    }
  }
  
  echo '<div style="position:absolute; left:60px; height:20px;">
  <table border="0" class="centerwhite"><tr>';
  if($votodato == 1){
  	echo '<td bgcolor="#0033FF" width="20" style="border:1px solid #FFF">'.$piu.'</td>';
    echo '<td bgcolor="#FF0011" width="20">'.$meno.'</td>';
  }elseif($votodato == 2){
  	echo '<td bgcolor="#0033FF" width="20">'.$piu.'</td>';
  	echo '<td bgcolor="#FF0011" width="20" style="border:1px solid #FFF">'.$meno.'</td>';
  }else{
  	echo '<td bgcolor="#0033FF" width="20"><a href="'.$sites.'index.php?vote='.$id_p.'&type=1" style="text-decoration:none; display:block;">'.$piu.'</a></td>';
    echo '<td bgcolor="#FF0011" width="20"><a href="'.$sites.'index.php?vote='.$id_p.'&type=2" style="text-decoration:none; display:block;">'.$meno.'</a></td>';
  }
  echo '<td>'.$date_p.'</td></tr></table></div><br><br><br></div>';
  $votodato = 0;
 }
 echo '</div>';
}

if(
	isset($_GET['vote']) AND 
    isset($_GET['type']) 
    ){
	$postvosto = intval ($_GET['vote']);
    $typevoto = intval ($_GET['type']);
    if($typevoto == 1 || $typevoto == 2){
		$vota = mysql_query("INSERT INTO votazioni_post (utente, tipo, post) VALUES ('$id','$typevoto','$postvosto')");
    		if(!$vota){
    			echo '<script>alert("Votazione non riuscita");</script>';
    		}
    }else{
    	echo '<script>alert("\"'.$typevoto.'\" non valido");</script>';
	}
    echo '<script>window.location = "http://hightterabyte.altervista.org/index.php"</script>';
}

?>
