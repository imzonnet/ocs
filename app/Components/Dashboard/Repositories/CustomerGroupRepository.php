<?php namespace App\Components\Dashboard\Repositories;

use App\Repositories\BaseRepository;

interface CustomerGroupRepository extends BaseRepository
{
	/**
	 * Get list items
	 * @return array
	 */
	public function listGroups();

}