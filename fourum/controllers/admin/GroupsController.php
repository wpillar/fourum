<?php namespace Fourum\Controllers\Admin;

use Fourum\Controllers\AdminController;
use Fourum\Storage\Group\GroupRepositoryInterface;
use Fourum\Storage\Setting\Manager;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
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
        $data['groups'] = $this->groups->all();

        return View::make('groups.index', $data);
    }

    public function add()
    {
        $data = array();

        return View::make('groups.add', $data);
    }

    public function save()
    {
        $name = Input::get('name');

        $group = array(
            'name' => $name
        );

        $this->groups->create($group);

        return Redirect::to('admin/groups');
    }
}
