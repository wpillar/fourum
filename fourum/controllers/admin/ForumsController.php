<?php

namespace Fourum\Controllers\Admin;

use Fourum\Controllers\AdminController;
use Fourum\Models\Forum\Type;
use Fourum\Models\Forum;
use Fourum\Tree\Node;
use Fourum\Tree\NodeRepositoryInterface;
use Fourum\Storage\Forum\ForumRepositoryInterface;
use Fourum\Storage\Setting\Manager;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ForumsController extends AdminController
{
    /**
     * @var ForumRepositoryInterface
     */
    private $forumRepository;

    /**
     * @var NodeRepositoryInterface
     */
    private $nodeRepository;

    /**
     * @param Manager $manager
     * @param ForumRepositoryInterface $forumRepository
     */
    public function __construct(
        Manager $manager,
        ForumRepositoryInterface $forumRepository,
        NodeRepositoryInterface $nodeRepository
    ) {
        parent::__construct($manager);

        $this->forumRepository = $forumRepository;
        $this->nodeRepository = $nodeRepository;
    }

    /**
     * @return View
     */
    public function index()
    {
        $data['tree'] = $this->tree;

        return View::make('forums.index', $data);
    }

    /**
     * @return View
     */
    public function add()
    {
        $data['tree'] = $this->tree;
        $data['types'] = Type::all();

        return View::make('forums.add', $data);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save()
    {
        $title = Input::get('title');
        $type = Input::get('type');
        $parent = Input::get('parent');

        $forum = new Forum();
        $forum->title = $title;
        $forum->type = $type;
        $forum->save();

        if ($parent !== "null") {
            $parent = $this->forumRepository->get($parent);
            $parentNode = $parent->getNode();

            $forumNode = $this->nodeRepository->create(array('forum_id' => $forum->id));
            $forumNode->makeChildOf($parentNode);
        } else {
            $forumNode = $this->nodeRepository->create(array('forum_id' => $forum->id));
            $forumNode->makeChildOf($this->tree);
        }

        return Redirect::to('admin/forums');
    }
}
