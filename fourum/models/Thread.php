<?php namespace Fourum\Models;

class Thread extends Eloquent
{
    protected $table = 'threads';

    public function posts()
    {
        return $this->hasMany('Post');
    }
}
