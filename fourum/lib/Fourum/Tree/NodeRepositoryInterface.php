<?php

namespace Fourum\Tree;

/**
 * Interface for a Node Repository
 *
 * A repository for creating and retrieving nodes.
 */
interface NodeRepositoryInterface
{
	/**
	 * @param array $data
	 * @return Node
	 */
	public function create($data);

	/**
	 * @param int $forumId
	 * @return Node
	 */
	public function getByForum($forumId);
}