<?php namespace Fourum\Controllers;

use Illuminate\Support\Facades\View;

class InstallController extends BaseController
{
	public function index()
	{
		return View::make('install.index');
	}
}
