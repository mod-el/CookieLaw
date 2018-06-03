<?php
$config = $this->model->_CookieLaw->retrieveConfig();
?>
<div class="wrapped">
	<h1 style="text-align: <?= $config['title-align'] ?>">INFORMATIVA COOKIES</h1>
	<h2>Informativa ai sensi dell'art. 13 del d.lgs. n. 196/2003 (c.d. codice privacy)</h2>
	<p><?= entities($config['name']) ?><?php
		if ($config['address'])
			echo ', con sede in ' . entities($config['address']) . ', ';
		?> informa, ai sensi dell'art. 13 del Codice Privacy ed in ottemperanza alle prescrizioni del Provvedimento 229/2014 del Garante per la Protezione dei Dati Personali, che il presente sito utilizza le seguenti tipologie di cookie:</p>

	<h3>Cookie tecnici</h3>
	<p>
		Quei cookie strettamente necessari per permettere:<br/> - la navigazione e fruizione del sito web (permettendo, ad esempio, di realizzare un acquisto o autenticarsi per accedere ad aree riservate, &quot;cookie di navigazione o di sessione&quot;);<br/> - la raccolta di informazioni, in forma aggregata, sul numero degli utenti e su come questi visitano il sito stesso (&quot;cookie analytics&quot;);<br/> - la navigazione in funzione di una serie di criteri selezionati (ad esempio, la lingua, i prodotti selezionati per l'acquisto, &quot;cookie di funzionalit&agrave;&quot;) al fine di migliorare il servizio reso allo stesso.<br/> Tali cookie sono installati direttamente da <?= entities($config['name']) ?> e poich&eacute; non vengono utilizzati per scopi ulteriori rispetto a quelli funzionali sopra descritti la loro installazione non richiede il tuo consenso.
	</p>

	<?php
	if ($config['analytics']) { ?>
		<h3>Cookie di profilazione di terze parti</h3>
		<p>
			Tali cookie sono installati da soggetti diversi da <?= entities($config['name']) ?> e l&rsquo;installazione degli stessi richiede il tuo consenso; in mancanza gli stessi non saranno installati.<br/> Ti riportiamo quindi di seguito i link alle informative privacy delle terze parti dove potrai esprimere il tuo consenso all&rsquo;installazione di tali cookie evidenziando che, laddove non effettuassi alcuna scelta e decidessi di proseguire comunque con la navigazione all&rsquo;interno del presente sito web, acconsentirai all&rsquo;uso di tali cookie.
		</p>

		<?php if ($config['analytics']) { ?>
			<p>
				<b>Google</b><br/>
			<ul>
				<li>
					<a href="http://www.google.com/intl/it/policies/technologies/types/" target="_blank">http://www.google.com/intl/it/policies/technologies/types/</a>
				</li>
				<li>
					<a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage" target="_blank">https://developers.google.com/analytics/devguides/collection/analyticsjs/cookie-usage</a>
				</li>
			</ul>
			</p>
		<?php } ?>

		<?php /* Eventuali altri servizi terzi */ ?>

	<?php } ?>
</div>