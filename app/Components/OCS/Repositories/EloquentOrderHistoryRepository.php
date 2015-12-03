<?php
namespace App\Components\OCS\Repositories;

use App\Components\OCS\Models\OrderHistory;
use App\Repositories\EloquentBaseRepository;

class EloquentOrderHistoryRepository extends EloquentBaseRepository implements OrderHistoryRepository
{
    /**
     * @var $model
     */
    protected $model;

	/**
	 * @param $model
	 */
    public function __construct(OrderHistory $model)
    {
        $this->model = $model;
    }

	public function listHistory() {
		return $this->model->lists('title', 'id');
	}
}