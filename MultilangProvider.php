<?php namespace Model\CookieLaw;

use Model\Multilang\MultilangProviderInterface;

class MultilangProvider implements MultilangProviderInterface
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
