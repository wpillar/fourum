<?php namespace Fourum\Controllers;

use Illuminate\Support\Facades\View;
use Fourum\Tree\Node;

/**
 * Laravel's Base Controller
 */
class BaseController extends \Controller
{
	/**
	 * @var Fourum\Tree\Node
	 */
	protected $tree;

	public function __construct()
	{
		$this->tree = Node::root();
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
}
