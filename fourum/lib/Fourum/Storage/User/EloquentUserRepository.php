<?php namespace Fourum\Storage\User;

use Fourum\Models\User;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function get($id)
    {
        return User::find($id);
    }

    public function create($input)
    {
        return User::create($input);
    }
}
