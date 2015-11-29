<?php
namespace App\Components\OCS\Repositories;

use App\Components\OCS\Models\OrderStatus;
use App\Repositories\EloquentBaseRepository;

class EloquentOrderStatusRepository extends EloquentBaseRepository implements OrderStatusRepository
{
    /**
     * @var $model
     */
    protected $model;

	/**
	 * @param $model
	 */
    public function __construct(OrderStatus $model)
    {
        $this->model = $model;
    }

	public function listStatus() {
		return $this->model->lists('title', 'id');
	}
}