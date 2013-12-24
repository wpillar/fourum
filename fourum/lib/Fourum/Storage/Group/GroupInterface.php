<?php namespace Fourum\Storage\Group;

/**
 * Interface controlling Group interactions.
 */
interface GroupInterface
{
    /**
     * Get the Users in the Group
     * @return array
     */
    public function getUsers();

    public function getId();
}
