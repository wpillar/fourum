<?php namespace Fourum\Models;

use Fourum\Storage\Group\GroupInterface;

/**
 * Eloquent Group Model
 */
class Group extends \Eloquent implements GroupInterface
{
    protected $table = 'groups';

    protected $guarded = array('id');

    /**
     * Get Users that are a member of this Group
     *
     * @return array
     */
    public function users()
    {
        return $this->belongsToMany('User');
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsers()
    {
        return $this->users();
    }
}
