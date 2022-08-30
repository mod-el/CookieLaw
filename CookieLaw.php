<?php namespace Model\CookieLaw;

use Model\Core\Module;

class CookieLaw extends Module
{
	private ?array $choice;

	public function init(array $options)
	{
		if (isset($_COOKIE['model-cookies-choice'])) {
			$this->choice = json_decode($_COOKIE['model-cookies-choice'], true);
			if (!$this->choice or empty($this->choice['type']) or !in_array($this->choice['type'], ['accepted', 'rejected', 'list'])) {
				setcookie('model-cookies-choice', '', 0);
				$this->choice = null;
			}
		} else {
			$this->choice = null;
		}
	}

	public function headings()
	{
		$showCookieBar = $this->choice ? false : true;
		$config = $this->retrieveConfig();

		echo '<script>';
		if ($showCookieBar) {
			echo 'var model_cookie_dict = ' . json_encode([
					'row1' => $this->model->moduleExists('Multilang') ? $this->model->_Multilang->word('cookie-law.row1') : CookieLawDictionary::$words['row1']['it'],
					'row2' => $this->model->moduleExists('Multilang') ? $this->model->_Multilang->word('cookie-law.row2') : CookieLawDictionary::$words['row2']['it'],
					'cookie-policy' => $this->model->moduleExists('Multilang') ? $this->model->_Multilang->word('cookie-law.cookie-policy') : CookieLawDictionary::$words['cookie-policy']['it'],
					'accept' => $this->model->moduleExists('Multilang') ? $this->model->_Multilang->word('cookie-law.accept') : CookieLawDictionary::$words['accept']['it'],
					'refuse' => $this->model->moduleExists('Multilang') ? $this->model->_Multilang->word('cookie-law.refuse') : CookieLawDictionary::$words['refuse']['it'],
					'customize' => $this->model->moduleExists('Multilang') ? $this->model->_Multilang->word('cookie-law.customize') : CookieLawDictionary::$words['customize']['it'],
				]) . ';';
		}
		echo 'var show_model_cookie_bar = ' . json_encode($showCookieBar) . ';';
		echo 'var model_cookie_bar_providers = ' . json_encode($config['providers']) . ';';
		echo '</script>';
	}

	public function getController(array $request, string $rule): ?array
	{
		return $rule === 'cookie-policy' ? [
			'controller' => 'CookiePolicy',
		] : null;
	}

	public function isAccepted(?string $cookieType = null): bool
	{
		if ($this->choice === null)
			return false;

		switch ($this->choice['type']) {
			case 'accepted':
				return true;

			case 'rejected':
				return false;

			case 'list':
				if ($cookieType === null)
					return true;

				return in_array($cookieType, $this->choice['list'] ?? []);
		}

		return false;
	}
}
