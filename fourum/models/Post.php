<?php namespace Fourum\Models;

use Fourum\Storage\Post\PostInterface;

/**
 * Eloquent Post Model
 */
class Post extends Eloquent implements PostInterface
{
    protected $table = 'posts';

    public function thread()
    {
        return $this->belongsTo('Thread');
    }
}
