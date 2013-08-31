<?php namespace Fourum\Storage\Group;

/**
 * Interface for fetching and creating Groups
 */
interface GroupRepositoryInterface
{
    /**
     * Get all Groups
     */
    public function all();

    /**
     * Get Group(s)
     *
     * @param  mixed $id
     */
    public function get($id);

    /**
     * Create a new Group
     *
     * @param  array  $input
     */
    public function create(array $input);
}
