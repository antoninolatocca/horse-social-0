<?php

$post = "Quanto manca alle 20?";
$tempo = str_replace(" tempo ", "", $post);

if(stripos($tempo, 'e mezza')){
 $passato = 30;
 $tempo = str_replace(" e mezza", "", $tempo);
}else{
 $passato = 0;
}

$ricerca = trim(str_replace("?", "", $tempo));

$hour = date("G");
$minuts = date("i");
$richiesta = substr($ricerca, stripos($ricerca, "?") - 2);
if(intval($richiesta)){

if($hour < $richiesta){
 $differenza = $richiesta - $hour;

if($passato == 30){
 if($minuts < $passato){
  $min = $passato - $minuts;
 }else{
   $differenza = $differenza - 1;
   $min = $passato - $minuts + $passato;
 }
}elseif($passato == 0){
  $differenza = $differenza - 1;
  $min = 60 - $minuts;
}

 echo 'mancano '.$differenza.' ore e '.$min.' minuti alle '.$richiesta;
}

}

?>