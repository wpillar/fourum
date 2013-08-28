<?php namespace Fourum\Controllers;

use Illuminate\Support\Facades\View;

/**
 * Install Controller
 *
 * Handles the installation of Fourum.
 */
class InstallController extends BaseController
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
