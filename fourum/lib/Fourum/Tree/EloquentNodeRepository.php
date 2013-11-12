<?php

namespace Fourum\Tree;

/**
 * Eloquent Repository for Nodes
 */
class EloquentNodeRepository implements NodeRepositoryInterface
{
	/**
	 * @param array $data
	 * @return Node
	 */
	public function create($data)
	{
		return Node::create($data);
	}

	/**
	 * @param int $forumId
	 * @return Node
	 */
	public function getByForum($forumId)
	{
		return Node::where('forum_id', $forumId)->first();
	}
}