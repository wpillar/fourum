<?php namespace Fourum\Storage\Post;

/**
 * Interface for interacting with Posts
 */
interface PostInterface
{
    /**
     * Get the Thread that the Post belongs to.
     */
    public function thread();
}
