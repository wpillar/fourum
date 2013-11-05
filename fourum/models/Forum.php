<?php namespace Fourum\Models;

use Fourum\Storage\Forum\ForumInterface;
use Fourum\Models\Forum\Type;
use Fourum\Tree\Node;

/**
 * Eloquent Forum Model
 */
class Forum extends \Eloquent implements ForumInterface
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

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getNode()
    {
        return Node::where('forum_id', $this->id)->first();
    }

    /**
     * @return boolean
     */
    public function isCategory()
    {
        return $this->type === Type::getCategoryType()->id;
    }

    /**
     * @return boolean
     */
    public function isForum()
    {
        return $this->type === Type::getCategoryType()->id;
    }
}
