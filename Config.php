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
	\'name\' => \'Il sottoscritto\',
	\'address\' => \'\',
	\'title-align\' => \'left\',
	\'analytics\' => false,
];
';
		});
	}

	public function getRules(): array
	{
		return [
			'rules' => [
				'cookie-law' => 'cookie-law',
			],
			'controllers' => [
				'CookieLaw',
			],
		];
	}
}
