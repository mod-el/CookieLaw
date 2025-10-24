<?php namespace Model\CookieLaw;

use Model\Core\Module_Config;

class Config extends Module_Config
{
	/**
	 */
	protected function assetsList(): void
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

	public function getConfigData(): ?array
	{
		return [
			'name' => ['label' => 'Nome sito', 'default' => APP_NAME],
			'wrapper-class' => ['label' => 'Classe CSS contenitore', 'default' => 'container py-3'],
		];
	}
}
