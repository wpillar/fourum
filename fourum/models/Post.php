<?php namespace Fourum\Models;

use Fourum\Storage\Post\PostInterface;
use Fourum\Storage\User\UserInterface;

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

    public function setContent($content)
    {
        $this->content = nl2br($content);
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getAuthor()
    {
        return $this->user()->first();
    }

    public function getId()
    {
        return $this->id;
    }

    public function isAuthor(UserInterface $user)
    {
        return $this->user_id === $user->getId();
    }

    public function isEdited()
    {
        return $this->created_at != $this->updated_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at->format('d/m/Y H:i:s');
    }

    public function user()
    {
        return $this->belongsTo('Fourum\Models\User');
    }
}
