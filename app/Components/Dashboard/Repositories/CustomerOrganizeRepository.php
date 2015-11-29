<?php namespace App\Components\Dashboard\Repositories;

use App\Repositories\BaseRepository;

interface CustomerOrganizeRepository extends BaseRepository
{

	/**
	 * Get list
	 * @return array
	 */
	public function listOrganizes();
}