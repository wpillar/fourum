<?php namespace Fourum\Models;

class Post extends Eloquent
{
    protected $table = 'posts';

    public function thread()
    {
        return $this->belongsTo('Thread');
    }
}
