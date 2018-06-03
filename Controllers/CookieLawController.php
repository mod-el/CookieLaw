<?php namespace Model\CookieLaw\Controllers;

use Model\Core\Controller;

class CookieLawController extends Controller
{
	function index()
	{
		$this->viewOptions['template-module-layout'] = 'Home';
		$this->viewOptions['template-module'] = 'CookieLaw';
	}
}
