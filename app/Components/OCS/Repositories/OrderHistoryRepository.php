<?php namespace App\Components\OCS\Repositories;

use App\Repositories\BaseRepository;

interface OrderHistoryRepository extends BaseRepository
{

	public function listHistory();

}