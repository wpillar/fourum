<?php namespace Fourum\Controllers;

use Fourum\Storage\Setting\Manager;
use Fourum\Tree\Node;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

/**
 * Laravel's Base Controller
 */
class BaseController extends Controller
{
	/**
	 * @var Fourum\Tree\Node
	 */
	protected $tree;

	/**
	 * @var \Fourum\Storage\Setting\Manager
	 */
	protected $settings;

	public function __construct(Manager $settings)
	{
		$this->tree = Node::root();
		$this->settings = $settings;
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	/**
	 * @param string $name
	 * @return mixed
	 */
	protected function getSetting($name)
	{
		return $this->settings->get($name);
	}

	/**
	 * @return \Fourum\Models\User
	 */
	protected function getUser()
	{
		return Auth::user();
	}
}
