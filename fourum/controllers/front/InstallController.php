<?php namespace Fourum\Controllers\Front;

use Illuminate\Support\Facades\View;
use Fourum\Controllers\FrontController;

/**
 * Install Controller
 *
 * Handles the installation of Fourum.
 */
class InstallController extends FrontController
{
    /**
     * Index
     *
     * @return void
     */
	public function index()
	{
		return View::make('install.index');
	}
}
