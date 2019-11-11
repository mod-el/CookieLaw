function scriviCookie(nomeCookie, valoreCookie, durataCookie) {
	var scadenza = new Date();
	var adesso = new Date();
	scadenza.setTime(adesso.getTime() + (parseInt(durataCookie) * 1000));
	document.cookie = nomeCookie + '=' + escape(valoreCookie) + '; expires=' + scadenza.toGMTString() + '; path=/';
}

window.addEventListener('load', function () {
	if (typeof show_cookie_bar !== 'undefined' && show_cookie_bar) {
		showCookieBar();
	}
});

function showCookieBar() {
	if (typeof PATHBASE !== 'undefined')
		var path = PATHBASE;
	else
		var path = PATH;
	var div = document.createElement('div');
	div.id = 'cookie-law-bar';
	div.innerHTML = '<div style="width: 1100px; max-width: 95%; overflow: hidden; margin: auto"><a href="#" onclick="cookieLawOk(); return false"><img src="' + path + 'model/CookieLaw/files/close.png" alt="Accetto" style="margin-top: 5px; float: right" /></a>Questo sito utilizza cookie, anche di terze parti, per inviarti pubblicità e servizi in linea con le tue preferenze. Se vuoi saperne di più o negare il consenso a tutti o ad alcuni cookie <a href="' + PATH + 'cookie-law" target="_blank">clicca qui</a>. Chiudendo questo banner o cliccando qualunque suo elemento acconsenti all\'uso dei cookie.</div>';
	div.style.height = '0px';
	div = document.body.insertBefore(div, document.body.firstChild);
	div.offsetHeight;
	div.style.height = div.firstChild.offsetHeight + 'px';
}

function cookieLawOk() {
	document.getElementById('cookie-law-bar').style.height = '0px';
	setTimeout(function () {
		document.body.removeChild(document.getElementById('cookie-law-bar'));
	}, 500);

	scriviCookie('cookies-accepted', 1, 60 * 60 * 24 * 365 * 5);
}