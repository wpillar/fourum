<?php namespace Fourum\Storage\Forum;

/**
 * Forum Repository Interface
 *
 * Interface for a Forum Repository
 */
interface ForumRepositoryInterface
{
    /**
     * Return all Forums
     */
    public function all();

    /**
     * Find Forum(s)
     *
     * @param  integer $id
     */
    public function get($id);

    /**
     * Create a Forum
     *
     * @param  array $input
     */
    public function create(array $input);
}
