<?php namespace Model\CookieLaw;

use Model\Core\Module_Config;

class Config extends Module_Config
{

	/**
	 * @return bool
	 */
	public function makeCache(): bool
	{
		if ($this->model->moduleExists('Multilang'))
			$this->model->_Multilang->checkAndInsertWords('cookie-law', CookieLawDictionary::$words, 'user');

		return true;
	}

	/**
	 */
	protected function assetsList()
	{
		$this->addAsset('config', 'config.php', function () {
			return '<?php
$config = [
	\'name\' => APP_NAME,
	\'wrapper-class\' => \'container py-3\',
	\'page-element\' => null,
	\'providers\' => [],
];
';
		});
	}

	public function getRules(): array
	{
		return [
			'rules' => [
				'cookie-policy' => 'cookie-policy',
			],
			'controllers' => [
				'CookiePolicy',
			],
		];
	}

	public function getConfigData(): ?array
	{
		return [
			'name' => ['label' => 'Nome sito', 'default' => APP_NAME],
			'wrapper-class' => ['label' => 'Classe CSS contenitore', 'default' => 'container py-3'],
		];
	}
}
