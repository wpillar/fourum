<?php namespace Fourum\Models;

use Fourum\Storage\Thread\ThreadInterface;

/**
 * Eloquent Thread Model
 */
class Thread extends \Eloquent implements ThreadInterface
{
    protected $table = 'threads';

    protected $guarded = array('id');

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getUrl()
    {
        return url("thread/{$this->id}/{$this->getUrlFriendlyTitle()}");
    }

    public function getUrlFriendlyTitle()
    {
        return strtolower(str_replace(' ', '-', preg_replace("/[^A-Za-z0-9 ]/", '', $this->getTitle())));
    }

    public function getPosts()
    {
        return Post::where('thread_id', '=', $this->getId())->paginate(10);
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
