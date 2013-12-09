<?php namespace Fourum\Controllers\Admin;

use Fourum\Controllers\AdminController;
use Fourum\Storage\Group\GroupRepositoryInterface;
use Fourum\Storage\Setting\Manager;
use Illuminate\Support\Facades\View;

class GroupsController extends AdminController
{
    private $groups;

    public function __construct(GroupRepositoryInterface $groups, Manager $settings)
    {
        parent::__construct($settings);

        $this->groups = $groups;
    }

    public function index()
    {
        echo View::make('groups.index');
    }
}
