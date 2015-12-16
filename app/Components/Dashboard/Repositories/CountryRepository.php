<?php namespace App\Components\Dashboard\Repositories;

use App\Repositories\BaseRepository;

interface CountryRepository extends BaseRepository
{
	/**
	 * Get list items
	 * @return array
	 */
	public function listCountries();

}