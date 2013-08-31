<?php namespace Fourum\Models;

use Fourum\Storage\Thread\ThreadInterface;

/**
 * Eloquent Thread Model
 */
class Thread extends Eloquent implements ThreadInterface
{
    protected $table = 'threads';

    /**
     * Get Posts belonging to this Thread.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('Post');
    }
}
