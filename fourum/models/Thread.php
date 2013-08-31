<?php namespace Fourum\Models;

use Fourum\Storage\Thread\ThreadInterface;

/**
 * Eloquent Thread Model
 */
class Thread extends Eloquent implements ThreadInterface
{
    protected $table = 'threads';

    public function posts()
    {
        return $this->hasMany('Post');
    }
}
