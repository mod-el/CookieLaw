<?php namespace Model\CookieLaw;

use Model\Core\Module;

class CookieLaw extends Module
{
	public function headings()
	{
		if (!isset($_COOKIE['cookies-accepted'])) {
			echo '<script>var show_cookie_bar = true;</script>';
		}
	}

	public function getController(array $request, string $rule)
	{
		return $rule === 'cookie-law' ? [
			'controller' => 'CookieLaw',
		] : false;
	}
}
