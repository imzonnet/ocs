<?php
namespace App\Components\OCS\Repositories;

use App\Components\OCS\Models\Order;
use App\Components\OCS\Models\OrderDetail;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Auth\Guard;

class EloquentOrderDetailRepository extends EloquentBaseRepository implements OrderDetailRepository
{
    /**
     * @var $model
     */
    protected $model;
	protected $user;

	/**
	 * @param Order|OrderDetail $model
	 * @param Order $order
	 * @param Guard $user
	 */
    public function __construct(OrderDetail $model, Guard $user)
    {
        $this->model = $model;
	    $this->user = $user;
    }

	/**
	 * Create new record
	 *
	 * @param array $attributes
	 *
	 * @return static
	 */
	public function create(array $attributes = array())
	{
		$attributes['created_by'] = $this->user->user()->id;
		return $this->model->create($attributes);
	}
}