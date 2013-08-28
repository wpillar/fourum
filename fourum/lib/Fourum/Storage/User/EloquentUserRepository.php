<?php namespace Fourum\Storage\User;

use Fourum\Models\User;

/**
 * Eloquent User Repository
 *
 * User Repository for an Eloquent model.
 */
class EloquentUserRepository implements UserRepositoryInterface
{
    /**
     * Return all Users
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return User::all();
    }

    /**
     * Find User(s)
     *
     * @param  integer $id
     * @return \Illuminate\Database\Eloquent\Model|Collection
     */
    public function get($id)
    {
        return User::find($id);
    }

    /**
     * Create User
     * @param  array $input
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $input)
    {
        return User::create($input);
    }
}
