<?php

namespace Fourum\Tree;

use Illuminate\Support\ServiceProvider;

/**
 * Tree Service Provider
 *
 * Sets up bindings for Tree services
 */
class TreeServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind(
			'Fourum\Tree\NodeRepositoryInterface',
			'Fourum\Tree\EloquentNodeRepository'
		);
	}
}