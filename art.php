<?php 
$_GET['ID'] = filter_var($_GET['ID'],FILTER_VALIDATE_INT); 
if(!empty($_GET))
{
  if($_GET['ID'])
  {
  include 'header.php';
  include 'pannello.php';
  include 'text.php';
  include 'rindirizza.php';
  $id = $_GET['ID'];
  $q = mysql_query("SELECT * FROM article WHERE id = '$id'");
  while ($row = mysql_fetch_array($q, MYSQL_BOTH)) 
    {
    $titolo = $row['titolo']; 
    $articolo = $row['articolo'];
    $data = $row['data'];
    $autore = $row['autore'];
    }
  echo '<div id="pagearticolo">';
  echo '<div id="corpoarticolo"><div id="trasparentearticolo" class="opacoarticolo"></div><h1 class="titlearticolo">'.$titolo.'</h1><br>';
  echo '<p class="autorearticolo">Creato da <b>'.$autore.'</b>';
  if($data != 0000-00-00  && $data != NULL) 
    {
    echo '<br>il <b>'.$data.'</b></p>';
    } else { echo '</p>'; }
  echo '<p class="testoarticolo">'.$articolo.'</p>';
  echo '</div></div>';
  } else { ?><script language="javascript">document.location.href="index.php";</script><?php } 
} 
include 'script/banner/destra.html';
include 'script/banner/sinistra.html';
?>
