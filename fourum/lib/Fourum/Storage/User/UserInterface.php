<?php namespace Fourum\Storage\User;

/**
 * Interface for interacting with a User
 */
interface UserInterface
{
    /**
     * Get the Groups that the User is a member of.
     *
     * @return Fourum\Models\Group
     */
    public function groups();
}
