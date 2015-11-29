<?php
namespace App\Components\OCS\Repositories;

use App\Components\OCS\Models\Order;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Auth\Guard;

class EloquentOrderRepository extends EloquentBaseRepository implements OrderRepository
{
    /**
     * @var $model
     */
    protected $model;
	protected $user;

	/**
	 * @param Order $model
	 * @param Guard $user
	 */
    public function __construct(Order $model, Guard $user)
    {
        $this->model = $model;
	    $this->user = $user;
    }

	/**
	 * Create new record
	 *
	 * @param array $attributes
	 * @return static
	 */
	public function create(array $attributes = array())
	{
		$attributes['created_by'] = $this->user->user()->id;
		$attributes['created_date'] = \Carbon\Carbon::now();
		return $this->model->create($attributes);
	}
}