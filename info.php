<?php 
include 'header.php';
include 'pannello.php';
include 'text.php';
if(!isset($_SESSION['utente'])) { ?>
<div id="AltobannerI"><script type="text/javascript">
/* <![CDATA[ */
document.write('<s'+'cript type="text/javascript" src="http://ad.altervista.org/js.ad/size=300X250/r='+new Date().getTime()+'"><\/s'+'cript>');
/* ]]> */
</script></div><? } ?>
<div id="pageinfo">

<h1 class="centerwhite">Normative di Horse Social</h1><br>

<h2 class="centerwhite">Il sistema social degli utenti</h2><br><br>
<p class="Gwhite">

<b>Registrazione</b><br><br>
Ogni utente pu&#242; registrarsi <b>gratuitamente</b> al nostro sito, purch&#232; non sia mal intensionato e non si tratti di registrazioni non veritiere o generate da sistemi robotici automatici.
Si invita a registrarsi <b>solo come persone</b>: ogni profilo aziendale verr&#224; eliminato.
Per la registrazione sono richiesti: <i>nome</i>, <i>cognome</i>, <i>sesso</i>, <i>e-mail valida</i> e <i>password</i>.
Il nome e cognome servono per identificare la persona, il sesso (maschile o femminile), serve al sistema per utilizzare un linguaggio appropriato, l'email serve per la convalida di un profilo reale, nonch&#232; per poter ricevere tutte le informazioni utili e per poter accedere al sito, la password serve come protezione per l'accesso.
Si consiglia di scegliere password composte sia da lettere che da numeri e magari anche simboli. &#200; inoltre necessario usare almeno 8 caratteri. Le password vengono salvate nel database dopo essere state crittografate con sistemi irreversibili.
Il codice captcha ci serve per accertarci che l'utente che si sta registrando sia una persona fisica. Infatti si tratta di un'immagine generata casualmente dal sistema, pertanto illegibile da un computer.
Inseriti i dati nell'apposito form di registrazione - &#232; necessario compilarli tutti - un messaggio informa l'utente sull'esito dell'operazione.
Viene inviata una e-mail all'indirizzo inserito in fase di registrazione contenente un link composto da un codice casuale univoco.
Facendo click sul link contenuto nella mail la fase di registrazione sar&#224; completata e potrete accedere al progetto fin da subito.
<br><br><br>

<b>Recuperare la password</b><br><br>
Se avete dimenticato la vostra password, non c'&#232; motivo di allarmarsi, perch&#232; il sistema prevede anche la procedura per il recupero.
In realt&#224;, a causa dell'irreversibilit&#224; della crittografia della password non &#232; possibile recuperare la vecchia passowrd, ma soltanto reimpostarla.
Per poter fare questo bisogna fare click sul link che trovate sotto il form di accesso con scritto <i>&#34;Hai dimenticato la password?&#34;</i>, nel form successivo bisogna inserire l'indirizzo e-mail associato all'account di cui si vuole recuperare la password.
Verr&#224; inviato una mail contenente un link univoco al quale bisogna inserire e impostare la nuova password.
Dopo di ci&#242; sar&#224; immediatamente possibile accedere al sito con la nuova password.
<br><br><br>

<b>Votare i post</b><br><br>
Abbiamo inserito la possibilit&#224; di esprimere un parere sui post pubblicati dagli utenti e su tutte le notizie di Horse Social che trovi nella pagina iniziale.
Il quadratino blu (0033FF) indica un voto positivo, quello rosso (FF0011) indica un voto negativo.
Si pu&#242; esprimere un solo voto per ogni post facendo click sul quadratino.
Una volta espresso il proprio voto, questo &#232; irrevocabile.
Esprimendo un voto positivo non &#232; possibile sprimere contemporaneamente un voto negativo e viceversa.
Il voto espresso viene indicato con il bordo bianco (FFFFFF) del quadratino.
Solo l'utente pu&#242; vedere i voti che ha espresso sfogliando le varie notizie. Gli altri utenti visualizzeranno solo il numero di voti positivi o negativi espressi in totale da tutti gli utenti.
</p>

<br><br><br>

<h2 class="centerwhite">Il reso di Horse Social</h2><br><br>

<p class="Gwhite">

<b>Come si guadagna</b><br><br>

Per rendere il servizio interattivo, e offrire una vasta gamma di contenuti, abbiamo pensato di integrare un sistema di reso. Si tratta di un conto virtuale su cui gli utenti possono accumulare denaro e spenderlo usufruendo di tutti i servizi messi a disposizione dal sito.<br>
Per accumulare denaro sul proprio conto, attualmente, il sito mette a disposizione due vie: invitare un amico ad iscriversi e caricare immagini per la gallery.
Per invitare un amico ad iscriversi, basta inserire gli indirizzi e-mail nell'apposita casella presente a destra nella home page (pagina iniziale, dopo aver fatto il login). Gli indirizzi email inseriti vengono salvati in una lista a disposizione solo degli sviluppatori. Appena possibile, provvederemo ad inviare una mail di invito agli indirizzi indicati.<br>
<b>La commissione per l'invito degli amici &#232; di &#8364 0,50 per ogni amico iscritto</b><br><br>
Per quanto riguarda il secondo metodo, si intende per caricamento delle foto dei cavalli del Centro Equestre La Gabbianella di Melfi, che non mostrino volti. La commissione viene assegnata appena possibile, anche se le foto verranno pubblicate successivamente. Inoltre sono conteggiate solo le foto pubblicate direttamente dall'utente sul sito e non recuperate dagli sviluppatori con altri mezzi.<br>
<b>La commissione per il caricamento delle foto &#232; di &#8364 0,10 per ogni foto valida caricata</b><br><br>
Un altro metodo di accumulare credito &#232; quello di publicare gli articoli per il giornalino &#8220Il Gabbiano&#8221. Gli articoli vanno inviati alla redazione con tutti i dati richiesti. Questi verranno convalidati e saranno pubblicati alla prima pubblicazione utile.<br>
<b>La commissione per la pubblicazione di articoli &#232; di &#8364 0,10 per ogni copia venduta e per ogni articolo pubblicato</b><br><br><br>

<b>Tipologia e stato del saldo</b><br><br>

Facendo click sul saldo nel pannello utente verrete indirizzati alla pagina del resoconto. Una tabella mostra la descrizione della transizione, la tipologia, cio� se si tratta di un accredito (+) o di un addebito (-), lo stato se &#232; sospeso o confermato e l'importo. IL saldo sar&#224; confermato al momento del raggiungimento di almeno &#8364 15,00 sul conto di Altervista. Lo stato sospeso non implica la possibilit&#224; di non poter utilizzare il credito, ma ne limita la possibilit&#224; di poterlo richiedere in denaro. La gestione monetaria dell&#39intero sistema &#232; complessa, basata su fonti reali di investimento.<br>Gli sviluppatori si impegnano a non modificare il saldo di nessun utente senza l'approvazione motivata del responsabile generale. Le regole sono valide per tutti. Gli sviluppatori possono tuttavia accreditare denaro sui loro conti, al solo scopo di sviluppo del sistema. I crediti non autorizzati non possono essere utilizzati ne monetizzati.

</p>

<br><br><br>

<?php 
if(isset($_SESSION['utente'])){ 
$Antonino = '<a href="'.$sites.'user.php?ID=1">Antonino LATOCCA</a>';
$Federico= '<a href="'.$sites.'user.php?ID=6">Federico FLORIS</a>'; 
}else{
$Antonino = 'Antonino LATOCCA';
$Federico= 'Federico FLORIS'; 
}
?>
<h1 class="centerwhite">Team di sviluppo</h1><br><br>

<span class="contatti"><table><tr><td width="600">

	<p style="color:white">
	<?php echo '<b>'.$Federico.'</b>'; ?>
	
	<br><br>
	
	Cellulare: 346 2159072
	
	<br>
	
	Indirizzo e-mail:
	<a href="mailto:fededrummer79@gmail.com">fededrummer79@gmail.com</a>

</td><td width="600">

	<?php echo '<b>'.$Antonino.'</b>'; ?>
	
	<br><br>
	
	Cellulare: 346 0366756
	
	<br>
	
	Indirizzo e-mail:
	<a href="mailto:ant.soix@live.it">ant.soix@live.it</a>

</td></tr></table></span></p>

<br><br><br>

<div class="centrata">
<script type="text/javascript">
/* <![CDATA[ */
document.write('<s'+'cript type="text/javascript" src="http://ad.altervista.org/js.ad/size=728X90/r='+new Date().getTime()+'"><\/s'+'cript>');
/* ]]> */
</script>
</div>

<br><br>

</div>