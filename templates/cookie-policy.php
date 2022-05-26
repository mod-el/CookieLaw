<?php
$config = $this->model->_CookieLaw->retrieveConfig();
?>
<div class="<?= entities($config['wrapper-class']) ?>">
	<?php
	if ($config['page-element'] ?? null) {
		$page = $this->model->one($config['page-element']['element'], $config['page-element']['id_main']);

		echo '<h1>' . entities($page[$config['page-element']['title']]) . '</h1>';
		$text = $page[$config['page-element']['text']];

		$text_providers = '';
		if (count($config['providers'] ?? []) > 0) {
			$text_providers = $this->model->one($config['page-element']['element'], $config['page-element']['id_providers'])[$config['page-element']['text']];
			// TODO: sostituzione lista cookie terzi e relative privacy policy
		}

		$text = str_replace('[providers]', $text_providers, $text);
		$text = str_replace('[name]', entities($config['name']), $text);

		echo $text;
	} else {
		?>
		<h1>Cookie Policy</h1>

		<h3>Cosa sono i cookie</h3>
		<p>Un cookie è un piccolo file composto da lettere e numeri che viene inviato da un sito web al terminale dell'utente mentre quest'ultimo lo sta visitando. Il cookie installato memorizza delle informazioni che vengono ritrasmesse al sito web nel corso della visita o ad una visita successiva, per ricordare attività svolte in precedenza da un utente di Internet su un determinato sito web, tra cui l'inserimento di prodotti nel carrello del suddetto sito, l'accesso al sito in questione o l'apertura di link.</p>

		<h3>Politica sui cookie</h3>
		<p>In relazione all'uso dei cookies, navigando sul nostro sito, l'utente accetta il trasferimento dei nostri cookie sul proprio computer per i fini elencati di seguito (fatta eccezione nel caso in cui l'utente abbia scelto di disabilitarli tramite il proprio browser). Da un punto di vista tecnico, dopo aver accettato i cookie dal nostro sito web l'utente può ancora disabilitarli tramite il proprio browser. In caso di disabilitazione di tutti i cookie sul computer tramite il browser potrà essere inibito l'accesso a specifiche sezioni del sito o a servizi attraverso esso forniti.</p>

		<h3>Cookie utilizzati da <?= entities($config['name']) ?></h3>

		<h4>Cookie tecnici</h4>
		<p>
			I cookie tecnici sono utilizzati al solo fine di "effettuare la trasmissione di una comunicazione su una rete di comunicazione elettronica, o nella misura strettamente necessaria al fornitore di un servizio della società dell'informazione esplicitamente richiesto dall'abbonato o dall'utente ad erogare tale servizio" (art .122 comma 1 del Codice). Essi non vengono utilizzati per scopi ulteriori e sono normalmente installati direttamente dal titolare o gestore del sito web. Possono essere suddivisi in:
		<ol>
			<li>cookie di navigazione o di sessione, che garantiscono la normale navigazione e fruizione del sito web (permettendo ad esempio di realizzare un acquisto o di autenticarsi per accedere ad aree riservate)</li>
			<li>cookie analytics, assimilati ai cookie tecnici laddove utilizzati direttamente dal gestore del sito per raccogliere informazioni, in forma aggregata, sul numero degli utenti e su come questi visitino il sito stesso</li>
			<li>cookie di funzionalità, che permettono all'utente la navigazione e la fruizione di una serie di criteri selezionati (ad esempio la lingua, i prodotti selezionati per l'acquisto) al fine di migliorare il servizio reso allo stesso</li>
		</ol>
		</p>

		<?php
		if (count($config['providers'] ?? []) > 0) {
			?>
			<h4>Cookie di terzi</h4>
			<p>Nel corso della navigazione l'utente potrebbe ricevere sul suo terminale anche cookie di siti diversi (c.d. cookies di "terze parti"), impostati direttamente da gestori di detti siti web e utilizzati per le finalità e secondo le modalità da questi definiti.</p>
			<p>In questo caso <?= entities($config['name']) ?> non ha alcun controllo su tali cookie e la policy sulla gestione degli stessi va consultata direttamente sul sito di questi soggetti, ai link di seguito riportati:</p>
			<!-- TODO: lista cookie terzi e relative privacy policy -->

			<p>Inoltre, su alcune pagine potrebbero essere presenti dei "pulsanti" (denominati "social buttons") che raffigurano le icone di social network (Facebook, Twitter). Detti pulsanti consentono agli utenti del sito di interagire volontariamente con un "click" direttamente con i social network ivi raffigurati per condividerne un contenuto. In tal caso, il social network selezionato – rilasciando i propri cookie sul dispositivo utente - acquisisce i dati relativi alla visita dell'utente, mentre <?= entities($config['name']) ?> non riceverà alcuna informazione a riguardo. Per maggiori informazioni e per evitare l'installazione di tali cookie sul proprio dispositivo, si rinvia l'utente alle politiche pubblicate dai social media:</p>
			<!-- TODO: lista cookie social e relative privacy policy -->
			<!--
			Facebook Policy:  https://www.facebook.com/about/privacy/other
			Facebook opt-out: https://www.facebook.com/help/568137493302217
			Twitter Policy: https://twitter.com/privacy
			Twitter opt-out: https://support.twitter.com/articles/20170519-uso-dei-cookie-e-di-altre-tecnologie-simili-da-parte-di-twitter#
			-->
			<?php
		}
		?>
		<hr/>

		<p>La maggior parte dei browser accetta automaticamente i cookies, ma l'utente normalmente può modificare le impostazioni per disabilitare tale funzione. Consapevole che la disabilitazione dei cookie utilizzati nel presente Sito può causare il malfunzionamento di alcune componenti dello stesso, l'utente può avvalersi – oltre ai singoli strumenti di opt-out menzionati nel precedente paragrafo - delle seguenti istruzioni per eliminare la ricezione dei cookies da parte del proprio terminale o dispositivo.</p>
		<p>&Egrave; possibile bloccare tutte le tipologie di cookies, oppure accettare di riceverne soltanto alcuni e disabilitarne altri. La sezione "Opzioni" o "Preferenze" nel menu del browser permettono di evitare di ricevere cookies e altre tecnologie di tracciamento utente, e come ottenere notifica dal browser dell'attivazione di queste tecnologie. &Egrave; anche possibile individuare il browser utilizzato dalla lista qui proposta e seguire le istruzioni contenute nei relativi link:</p>
		<ul>
			<li><a href="http://windows.microsoft.com/it-it/windows7/how-to-manage-cookies-in-internet-explorer-9" target="_blank">Internet Explorer</a></li>
			<li><a href="https://support.google.com/chrome/answer/95647" target="_blank">Chrome</a></li>
			<li><a href="https://support.apple.com/it-it/HT201265" target="_blank">Safari</a></li>
			<li><a href="https://support.mozilla.org/it/kb/Attivare%20e%20disattivare%20i%20cookie" target="_blank">Firefox</a></li>
			<li><a href="http://www.opera.com/help/tutorials/security/" target="_blank">Opera</a></li>
		</ul>
		<p>Da dispositivo mobile:</p>
		<ul>
			<li><a href="https://support.google.com/chrome/answer/95647?hl=it" target="_blank">Android</a></li>
			<li><a href="https://support.apple.com/it-it/HT201265" target="_blank">Safari</a></li>
			<li><a href="http://www.windowsphone.com/it-it/how-to/wp7/web/changing-privacy-and-other-browser-settings" target="_blank">Windows Phone</a></li>
			<li><a href="http://docs.blackberry.com/en/smartphone_users/deliverables/32004/Turn_off_cookies_in_the_browser_60_1072866_11.jsp" target="_blank">Blackberry</a></li>
		</ul>
		<?php
	}
	?>
</div>
