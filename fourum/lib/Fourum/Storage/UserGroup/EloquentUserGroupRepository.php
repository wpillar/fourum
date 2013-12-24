<?php

namespace Fourum\Storage\UserGroup;

use Fourum\Models\UserGroup;
use Fourum\Storage\User\UserInterface;
use Fourum\Storage\Group\GroupInterface;

class EloquentUserGroupRepository implements UserGroupRepositoryInterface
{
    public function all()
    {
        return UserGroup::all();
    }

    public function get($id)
    {
        return UserGroup::find($id);
    }

    public function assign(UserInterface $user, GroupInterface $group)
    {
        $userGroup = array(
            'user_id' => $user->getId(),
            'group_id' => $group->getId()
        );

        return UserGroup::create($userGroup);
    }
}
