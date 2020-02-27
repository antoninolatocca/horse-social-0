<?php
include 'header.php';
include 'pannello.php';
include 'button_IG.php';
include'rindirizza.php';

function stamparti($row){
  $XD = $row['id'];
  $occhiello = $row['occhiello'];
  $titolo = $row['titolo'];
  $sommario = $row['sommario'];
  $articolo = $row['articolo'];
  $tag = $row['tag'];
  $data = $row['data'];
  $autore = $row['autore'];
  $categoria = $row['categoria'];
  echo '<div class="articolo">';
  echo '<p class="a_data">'.$data.'</p>';
  echo '<p class="a_occhiello">'.$occhiello.'</p>';
  $hrefere = '<a href="'.$sites.'art.php?ID='.$XD.'" style="color:#000;text-decoration:none;">';
  echo '<p class="a_titolo">'.$hrefere.$titolo.'</a></p>';
  echo '<p class="a_sommario">'.$sommario.'</p>';
  echo '<p class="a_articolo">'.$articolo.'</p>';
  echo '<p class="a_autore">'.$autore.'</p>';
  if($tag != ""){
   echo '<p class="a_tag">';
   $word = explode(",", $tag);
   $linee = count($word);
    while($linee >= 0){
      $tagc= trim($word[$linee]);
      echo '<a href='.$sites.' search.php?q='.$tagc.'>'.$tagc.'</a> ';
      $linee--;
    }
    echo '</p>';
  }
  echo '</div><br>';
}

if(isset($_SESSION['utente'])){
 $sel_art = mysql_query("SELECT * FROM article");
 if(mysql_num_rows($sel_art) > 0){
 echo '<div style="position:absolute;left:200px;top:250px;width:80%;">';
 $aqgbb = mysql_query("SELECT * FROM acquisti WHERE prodotto IN ( SELECT id FROM articoli_store WHERE magazine=1)");
  if(mysql_num_rows($aqgbb) > 0){
   while($row = mysql_fetch_array($sel_art)){
     stamparti($row);
   }
  }else{
   $query2 = mysql_query("SELECT * FROM article WHERE G = 0");
   if(mysql_num_rows($query2) > 0){
     while($row = mysql_fetch_array($query2)){
      stamparti($row);
    }
   }
  }
  echo '</div>';
 }
}

?>