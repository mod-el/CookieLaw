<?php namespace Model\CookieLaw\Controllers;

use Model\Core\Controller;

class CookiePolicyController extends Controller
{
	function index()
	{
		$this->model->viewOptions['template-module-layout'] = 'Home';
		$this->model->viewOptions['template-module'] = 'CookieLaw';
	}
}
