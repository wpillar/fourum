<?php

namespace Fourum\Models;

use Fourum\Storage\Forum\ForumInterface;
use Fourum\Models\Forum\Type;
use Fourum\Tree\Node;
use Fourum\Tree\NodeRepositoryInterface;
use Illuminate\Support\Facades\App;

/**
 * Eloquent Forum Model
 */
class Forum extends \Eloquent implements ForumInterface
{
    protected $table = 'forums';

    /**
     * @var NodeRepositoryInterface
     */
    private $nodeRepository;

    public function __construct()
    {
        parent::__construct();

        $this->nodeRepository = App::make('Fourum\Tree\NodeRepositoryInterface');
    }

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
        return $this->nodeRepository->getByForum($this->id);
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
