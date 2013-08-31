<?php namespace Fourum\Storage\Thread;

/**
 * Interface for interacting with a Thread
 */
interface ThreadInterface
{
    /**
     * Get Posts belonging to the Thread
     */
    public function posts();
}
