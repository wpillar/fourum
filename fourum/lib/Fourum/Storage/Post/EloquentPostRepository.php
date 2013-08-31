<?php namespace Fourum\Storage\Post;

use Fourum\Models\Post;

/**
 * Eloquent Post Repository
 */
class EloquentPostRepository implements PostRepositoryInterface
{
    /**
     * Get all Posts
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Post::all();
    }

    /**
     * Get Post(s)
     *
     * @param  mixed $id
     * @return \Illuminate\Database\Eloquent\Collection|Model
     */
    public function get($id)
    {
        return Post::find($id);
    }

    /**
     * Create a new Post
     *
     * @param  array  $input
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $input)
    {
        return Post::create($input);
    }
}
