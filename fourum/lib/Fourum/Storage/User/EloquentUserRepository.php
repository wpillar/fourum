<?php namespace Fourum\Storage\User;

use User;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return Post::all();
    }

    public function get($id)
    {
        return Post::find($id);
    }

    public function create($input)
    {
        return Post::create($input);
    }
}
