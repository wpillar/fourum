<?php

namespace Fourum\Controllers\Front;

use Fourum\Controllers\FrontController;
use Fourum\Storage\Forum\ForumRepositoryInterface;
use Fourum\Storage\Post\PostRepositoryInterface;
use Fourum\Storage\Setting\Manager;
use Fourum\Storage\Thread\ThreadRepositoryInterface;
use Fourum\Validation\ValidatorRegistry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

class PostController extends FrontController
{
    protected $threads;

    protected $forums;

    protected $posts;

    public function __construct(
        ThreadRepositoryInterface $threadRepository,
        ForumRepositoryInterface $forumRepository,
        PostRepositoryInterface $postRepository,
        ValidatorRegistry $registry,
        Manager $settings
    ) {
        parent::__construct($registry, $settings);

        $this->beforeFilter('auth');

        $this->threads = $threadRepository;
        $this->forums = $forumRepository;
        $this->posts = $postRepository;
    }

    public function getCreate($threadId)
    {
        $thread = $this->threads->get($threadId);

        $data['thread'] = $thread;

        return View::make('post.create', $data);
    }

    public function postCreate($threadId)
    {
        $thread = $this->threads->get($threadId);

        $post = array(
            'content' => Input::get('content')
        );

        $postValidator = $this->getValidator('post');
        if (! $postValidator->validate($post)) {
            return Redirect::to("post/create/$threadId")->withErrors($postValidator)->withInput();
        }

        $post['user_id'] = $this->getUser()->getId();

        $post = $this->posts->hydrate($post);
        $thread->posts()->save($post);

        return Redirect::to($thread->getUrl());
    }

    public function postEdit()
    {
        $post = $this->posts->get(Input::get('postId'));

        if (! $post->isAuthor(Auth::user())) {
            return App::abort(401, 'Not authorised to edit this post');
        }

        $post->setContent(Input::get('content'));

        $postValidation = array(
            'content' => $post->getContent()
        );

        $postValidator = $this->getValidator('post');
        if (! $postValidator->validate($postValidation)) {
            if (Request::ajax()) {
                return Response::json(array(
                    'error' => 'Post is invalid'
                ));
            } else {
                return App::abort(400, 'Post is invalid.');
            }
        }

        $this->posts->save($post);

        if (Request::ajax()) {
            return Response::json($post->toArray());
        } else {
            return 'hello';
        }
    }
}
