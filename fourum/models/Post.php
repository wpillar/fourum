<?php namespace Fourum\Models;

use Fourum\Storage\Post\PostInterface;

/**
 * Eloquent Post Model
 */
class Post extends Eloquent implements PostInterface
{
    protected $table = 'posts';

    /**
     * Get the Thread this Post belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thread()
    {
        return $this->belongsTo('Thread');
    }
}
