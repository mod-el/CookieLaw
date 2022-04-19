function writeCookie(name, value, duration) {
	let due = new Date();
	let now = new Date();
	due.setTime(now.getTime() + (parseInt(duration) * 1000));
	document.cookie = name + '=' + encodeURIComponent(value) + '; expires=' + due.toGMTString() + '; path=/';
}

window.addEventListener('load', function () {
	if (show_model_cookie_bar)
		showCookieBar();
});

function showCookieBar() {
	let div = document.createElement('div');
	div.id = 'cookie-law-bar';
	div.innerHTML = `<div>Il sito che stai per visitare utilizza cookie o tecnologie simili, anche di terze parti, per finalità tecniche e, con il tuo consenso, anche per altre finalità come specificato nella <a href="${PATH}cookie-policy">cookie policy</a>.<br/>
		Puoi acconsentire all’utilizzo di tali tecnologie utilizzando il pulsante “Accetta”. Chiudendo questa informativa, continui senza accettare.<br/>
		<br/>
		<div style="text-align: right">
				${model_cookie_bar_providers.length ? `<a href="#" onclick="cookieBarUpdateChoice(false); return false" class="cookie-bar-button cookie-bar-button-personalizza">Personalizza</a>` : ``}
				<a href="#" onclick="cookieBarUpdateChoice('rejected'); return false" class="cookie-bar-button cookie-bar-button-rifiuta">Rifiuta</a>
				<a href="#" onclick="cookieBarUpdateChoice('accepted'); return false" class="cookie-bar-button cookie-bar-button-accetta">Accetta</a>
		</div>
</div>`;
	div.style.opacity = 0;
	div = document.body.insertBefore(div, document.body.firstChild);
	div.offsetHeight;
	div.style.opacity = 1;
}

function cookieBarUpdateChoice(type) {
	document.getElementById('cookie-law-bar').style.opacity = 0;
	setTimeout(() => {
		document.body.removeChild(document.getElementById('cookie-law-bar'));
	}, 500);

	let cookie = {type};
	writeCookie('model-cookies-choice', JSON.stringify(cookie), 60 * 60 * 24 * 365 * 5);
}
