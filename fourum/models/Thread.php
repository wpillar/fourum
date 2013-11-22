<?php namespace Fourum\Models;

use Fourum\Storage\Thread\ThreadInterface;

/**
 * Eloquent Thread Model
 */
class Thread extends \Eloquent implements ThreadInterface
{
    protected $table = 'threads';

    protected $guarded = array('id');

    /**
     * Get Posts belonging to this Thread.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('Fourum\Models\Post');
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getUrl()
    {
        return url("thread/view/{$this->id}");
    }

    public function getPosts()
    {
        return $this->posts()->get();
    }
}
