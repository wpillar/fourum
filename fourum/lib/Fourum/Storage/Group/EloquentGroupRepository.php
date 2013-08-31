<?php namespace Fourum\Storage\Group;

use Fourum\Models\Group;

/**
 * Eloquent Repository for Groups
 */
class EloquentGroupRepository implements GroupInterface
{
    /**
     * Get all Groups
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Group::all();
    }

    /**
     * Get Group(s)
     *
     * @param  mixed $id
     * @return mixed
     */
    public function get($id)
    {
        return Group::find($id);
    }

    /**
     * Create a Group
     *
     * @param  array  $input
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $input)
    {
        return Group::create($input);
    }
}
