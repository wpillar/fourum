<?php namespace Fourum\Storage\Thread;

/**
 * Interface for a Thread Repository
 */
interface ThreadRepositoryInterface
{
    /**
     * Get all Threads
     */
    public function all();

    /**
     * Get Thread(s)
     * @param  mixed $id
     */
    public function get($id);

    /**
     * Create a Thread
     * @param  array  $input
     */
    public function create(array $input);
}
