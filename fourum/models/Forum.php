<?php namespace Fourum\Models;

use Fourum\Storage\Forum\ForumInterface;

/**
 * Forum
 */
class Forum extends Eloquent implements ForumInterface
{
    protected $table = 'forums';

    /**
     * Get the Type of the Forum
     *
     * @return Fourum\Models\Forum\Type
     */
    public function type()
    {
        return $this->belongsTo('Type');
    }
}
