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
	let row1 = model_cookie_dict['row1'].replace('[cookiepolicy]', `<a href="${PATH}cookie-policy">${model_cookie_dict['cookie-policy']}</a>`);
	div.innerHTML = `<div>
		${row1}<br/>
		${model_cookie_dict['row2']}<br/>
		<br/>
		<div style="text-align: right">
				${model_cookie_bar_providers.length ? `<a href="#" onclick="cookieBarUpdateChoice(false); return false" class="cookie-bar-button cookie-bar-button-personalizza">${model_cookie_dict['customize']}</a>` : ``}
				<a href="#" onclick="cookieBarUpdateChoice('rejected'); return false" class="cookie-bar-button cookie-bar-button-rifiuta">${model_cookie_dict['refuse']}</a>
				<a href="#" onclick="cookieBarUpdateChoice('accepted'); return false" class="cookie-bar-button cookie-bar-button-accetta">${model_cookie_dict['accept']}</a>
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
