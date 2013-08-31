<?php namespace Fourum\Models;

/**
 * Eloquent Group Model
 */
class Group extends Eloquent
{
    protected $table = 'groups';

    /**
     * Get Users that are a member of this Group
     *
     * @return array
     */
    public function users()
    {
        return $this->belongsToMany('User');
    }
}
