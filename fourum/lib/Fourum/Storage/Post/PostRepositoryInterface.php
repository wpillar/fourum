<?php namespace Fourum\Storage\Post;

/**
 * Interface for Post Repository
 */
interface PostRepositoryInterface
{
    /**
     * Get all Posts
     */
    public function all();

    /**
     * Get Post(s)
     * @param  mixed $id
     * @return mixed
     */
    public function get($id);

    /**
     * Create a Post
     * @param  array  $input
     */
    public function create(array $input);
}
