<?php namespace Fourum\Storage\Forum;

use Fourum\Models\Forum;

/**
 * Eloquent Forum Repository
 *
 * Forum Repository for an Eloquent model.
 */
class EloquentForumRepository implements ForumRepositoryInterface
{
    /**
     * Return all Forums
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Forum::all();
    }

    /**
     * Find Forum(s)
     *
     * @param  integer $id
     * @return \Illuminate\Database\Eloquent\Model|Collection
     */
    public function get($id)
    {
        return Forum::find($id);
    }

    /**
     * Create Forum
     * @param  array $input
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $input)
    {
        return Forum::create($input);
    }
}
