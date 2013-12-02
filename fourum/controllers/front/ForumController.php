<?php

namespace Fourum\Controllers\Front;

use Fourum\Controllers\FrontController;
use Fourum\Storage\Forum\ForumRepositoryInterface;
use Fourum\Storage\Setting\Manager;
use Fourum\Validation\ValidatorRegistry;
use Illuminate\Support\Facades\View;

class ForumController extends FrontController
{
	protected $forums;

	public function __construct(
		ForumRepositoryInterface $forumRepository,
		ValidatorRegistry $registry,
		Manager $settings
	) {
		parent::__construct($registry, $settings);

		$this->forums = $forumRepository;
	}

	public function view($id)
	{
		$forum = $this->forums->get($id);

		$data['forum'] = $forum;

		return View::make('forum.view', $data);
	}
}
