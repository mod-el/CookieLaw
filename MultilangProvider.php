<?php namespace Model\CookieLaw;

use Model\Multilang\AbstractMultilangProvider;

class MultilangProvider extends AbstractMultilangProvider
{
	public static function dictionary(): array
	{
		return [
			'cookie-law' => [
				'accessLevel' => 'user',
				'words' => require INCLUDE_PATH . 'model' . DIRECTORY_SEPARATOR . 'CookieLaw' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'dictionary.php',
			],
		];
	}
}
