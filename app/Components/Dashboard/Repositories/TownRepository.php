<?php namespace App\Components\Dashboard\Repositories;

use App\Repositories\BaseRepository;

interface TownRepository extends BaseRepository
{
	/**
	 * Get list items
	 *
	 * @param $country
	 *
	 * @return array
	 */
	public function listTowns($country = null);

}