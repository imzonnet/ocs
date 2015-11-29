<?php namespace App\Components\OCS\Repositories;

use App\Repositories\BaseRepository;

interface OrderStatusRepository extends BaseRepository
{

	public function listStatus();

}