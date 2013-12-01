<?php

namespace Fourum\Controllers\Front;

use Fourum\Controllers\FrontController;
use Fourum\Models\Forum;
use Fourum\Models\Thread;
use Fourum\Storage\Forum\ForumRepositoryInterface;
use Fourum\Storage\Post\PostRepositoryInterface;
use Fourum\Storage\Thread\ThreadRepositoryInterface;
use Fourum\Validation\ValidatorRegistry;
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
		PostRepositoryInterface $postRepository,
		ValidatorRegistry $registry
	) {
		parent::__construct($registry);

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

		$postValidation = array(
			'content' => Input::get('content')
		);

		$threadValidation = array(
			'title' => Input::get('title')
		);

		$threadValidator = $this->getValidator('thread');
		if (! $threadValidator->validate($threadValidation)) {
			return Redirect::to("thread/create/$forumId")->withErrors($threadValidator)->withInput();
		}

		$postValidator = $this->getValidator('post');
		if (! $postValidator->validate($postValidation)) {
			return Redirect::to("thread/create/$forumId")->withErrors($postValidator)->withInput();
		}

		$thread = $this->saveThread($forum);
		$this->savePost($thread);

		return Redirect::to($forum->getUrl());
	}

	private function savePost(Thread $thread)
	{
		$post = array(
			'content' => Input::get('content')
		);

		$post = $this->posts->hydrate($post);
		return $thread->posts()->save($post);
	}

	private function saveThread(Forum $forum)
	{
		$thread = array(
			'title' => Input::get('title')
		);

		$thread = $this->threads->hydrate($thread);
		return $forum->threads()->save($thread);
	}
}
