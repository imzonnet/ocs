<?php namespace App\Components\Dashboard\Repositories;

use App\Repositories\BaseRepository;

interface DistrictRepository extends BaseRepository
{
	/**
	 * Get list items
	 *
	 * @param $town
	 *
	 * @return array
	 */
	public function listDistricts($town = null);

}