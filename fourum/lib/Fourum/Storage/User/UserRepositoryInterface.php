<?php namespace Fourum\Storage\User;

/**
 * User Repository Interface
 *
 * Interface for a User Repository
 */
interface UserRepositoryInterface
{
    /**
     * Return all Users
     */
    public function all();

    /**
     * Find User(s)
     *
     * @param  integer $id
     */
    public function get($id);

    /**
     * Create a User
     *
     * @param  array $input
     */
    public function create(array $input);
}
