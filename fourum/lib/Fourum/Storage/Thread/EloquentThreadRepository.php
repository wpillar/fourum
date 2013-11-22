<?php

namespace Fourum\Storage\Thread;

use Fourum\Models\Thread;

/**
 * Eloquent Thread Repository
 */
class EloquentThreadRepository implements ThreadRepositoryInterface
{
    /**
     * Get all Threads
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Thread::all();
    }

    /**
     * Get Thread(s)
     * @param  mixed $id
     * @return \Illuminate\Database\Eloquent\Collection|Model
     */
    public function get($id)
    {
        return Thread::find($id);
    }

    /**
     * Create a Thread
     * @param  array  $input
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $input)
    {
        return Thread::create($input);
    }

    public function hydrate(array $input)
    {
        return new Thread($input);
    }
}
