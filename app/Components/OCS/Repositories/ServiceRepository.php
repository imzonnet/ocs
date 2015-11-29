<?php namespace App\Components\OCS\Repositories;

use App\Repositories\BaseRepository;

interface ServiceRepository extends BaseRepository
{
	/**
	 * @return mixed
	 */
	public function listServices();

}