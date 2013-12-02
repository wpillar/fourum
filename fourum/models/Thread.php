<?php namespace Fourum\Models;

use Fourum\Storage\Thread\ThreadInterface;

/**
 * Eloquent Thread Model
 */
class Thread extends \Eloquent implements ThreadInterface
{
    protected $table = 'threads';

    protected $guarded = array('id');


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

    public function getForum()
    {
        return $this->forum()->first();
    }

    public function getAuthor()
    {
        return $this->user()->get();
    }

    private function user()
    {
        return $this->belongsTo('Fourum\Models\User');
    }

    /**
     * Get Posts belonging to this Thread.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('Fourum\Models\Post');
    }

    public function forum()
    {
        return $this->belongsTo('Fourum\Models\Forum');
    }
}
