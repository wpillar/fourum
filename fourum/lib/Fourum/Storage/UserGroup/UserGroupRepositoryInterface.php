<?php

namespace Fourum\Storage\UserGroup;

use Fourum\Storage\User\UserInterface;
use Fourum\Storage\Group\GroupInterface;

interface UserGroupRepositoryInterface
{
    public function all();

    public function get($id);

    public function assign(UserInterface $user, GroupInterface $group);
}
