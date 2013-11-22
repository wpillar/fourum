<?php

namespace Fourum\Controllers\Front;

use Fourum\Controllers\FrontController;
use Fourum\Storage\Forum\ForumRepositoryInterface;
use Fourum\Storage\Post\PostRepositoryInterface;
use Fourum\Storage\Thread\ThreadRepositoryInterface;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ThreadController extends FrontController
{
	protected $threads;

	protected $forums;

	protected $posts;

	public function __construct(
		ThreadRepositoryInterface $threadRepository,
		ForumRepositoryInterface $forumRepository,
		PostRepositoryInterface $postRepository
	) {
		parent::__construct();

		$this->threads = $threadRepository;
		$this->forums = $forumRepository;
		$this->posts = $postRepository;
	}

	public function view($id)
	{
		$thread = $this->threads->get($id);

		$data['thread'] = $thread;

		return View::make('thread.view', $data);
	}

	public function getCreate($forumId)
	{
		$forum = $this->forums->get($forumId);

		$data['forum'] = $forum;

		return View::make('thread.create', $data);
	}

	public function postCreate($forumId)
	{
		$forum = $this->forums->get($forumId);

		$thread = array(
			'title' => Input::get('title'),
			'user_id' => 0,
			'views' => 0
		);

		$thread = $this->threads->hydrate($thread);
		$forum->threads()->save($thread);

		$post = array(
			'content' => Input::get('content'),
			'user_id' => 0
		);

		$post = $this->posts->hydrate($post);
		$thread->posts()->save($post);

		return Redirect::to($forum->getUrl());
	}
}