<?php namespace Model\CookieLaw\Providers;

use Model\Router\AbstractRouterProvider;

class RouterProvider extends AbstractRouterProvider
{
	public static function getRoutes(): array
	{
		return [
			[
				'pattern' => 'cookie-policy',
				'controller' => 'CookiePolicy',
			],
		];
	}
}
