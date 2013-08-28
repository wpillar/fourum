<?php namespace Fourum\Models;

class Group extends Eloquent
{
    protected $table = 'groups';

    public function users()
    {
        return $this->belongsToMany('User');
    }
}
