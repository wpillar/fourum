<?php

namespace Fourum\Controllers\Front;

use Fourum\Controllers\FrontController;
use Fourum\Storage\Forum\ForumRepositoryInterface;
use Illuminate\Support\Facades\View;

class ForumController extends FrontController
{
	protected $forums;

	public function __construct(ForumRepositoryInterface $forumRepository)
	{
		parent::__construct();

		$this->forums = $forumRepository;
	}

	public function view($id)
	{
		$forum = $this->forums->get($id);

		$data['forum'] = $forum;

		return View::make('forum.view', $data);
	}
}