<?php namespace Model\CookieLaw;

use Model\Core\Module_Config;

class Config extends Module_Config
{
//	public $configurable = true;

	/**
	 */
	protected function assetsList()
	{
		$this->addAsset('config', 'config.php', function () {
			return '<?php
$config = [
	\'name\' => APP_NAME,
	\'wrapper-class\' => \'container py-3\',
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
		return [];
	}
}
