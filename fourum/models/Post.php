<?php namespace Fourum\Models;

use Fourum\Storage\Post\PostInterface;

/**
 * Eloquent Post Model
 */
class Post extends \Eloquent implements PostInterface
{
    protected $table = 'posts';

    protected $guarded = array('id');

    /**
     * Get the Thread this Post belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thread()
    {
        return $this->belongsTo('Thread');
    }

    public function getContent()
    {
        return $this->content;
    }
}
