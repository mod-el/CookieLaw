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
					'row1' => $this->word('row1'),
					'row2' => $this->word('row2'),
					'cookie-policy' => $this->word('cookie-policy'),
					'accept' => $this->word('accept'),
					'refuse' => $this->word('refuse'),
					'customize' => $this->word('customize'),
				]) . ';';
		}
		echo 'var show_model_cookie_bar = ' . json_encode($showCookieBar) . ';';
		echo 'var model_cookie_bar_providers = ' . json_encode($config['providers']) . ';';
		echo '</script>';
	}

	private function word(string $w): string
	{
		if (class_exists('\\Model\\Multilang\\Dictionary')) {
			return \Model\Multilang\Dictionary::get('cookie-law.' . $w);
		} else {
			$dictionary = require INCLUDE_PATH . 'model' . DIRECTORY_SEPARATOR . 'CookieLaw' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'dictionary.php';
			return $dictionary[$w]['it'] ?? '';
		}
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
