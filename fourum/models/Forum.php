<?php namespace Fourum\Models;

use Fourum\Storage\Forum\ForumInterface;

/**
 * Eloquent Forum Model
 */
class Forum extends Eloquent implements ForumInterface
{
    protected $table = 'forums';

    /**
     * Get the Type of the Forum
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('Type');
    }
}
