<?php namespace Model\CookieLaw;

use Model\Core\Module_Config;

class Config extends Module_Config
{

	/**
	 * @return bool
	 */
	public function makeCache(): bool
	{
		if ($this->model->moduleExists('Multilang')) {
			$this->model->_Multilang->checkAndInsertWords('cookie-law', [
				'row1' => [
					'it' => 'Il sito che stai per visitare utilizza cookie o tecnologie simili, anche di terze parti, per finalità tecniche e, con il tuo consenso, anche per altre finalità come specificato nella [cookiepolicy].',
				],
				'row2' => [
					'it' => 'Puoi acconsentire all’utilizzo di tali tecnologie utilizzando il pulsante “Accetta”. Chiudendo questa informativa, continui senza accettare.',
				],
				'cookie-policy' => [
					'it' => 'cookie policy',
				],
				'accept' => [
					'it' => 'Accetta',
				],
				'refuse' => [
					'it' => 'Rifiuta',
				],
				'customize' => [
					'it' => 'Personalizza',
				],
			], 'user');
		}
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
