<?php
namespace App\Components\Dashboard\Repositories;

use App\Components\Dashboard\Models\CustomerGroup;
use App\Repositories\EloquentBaseRepository;

class EloquentCustomerGroupRepository extends EloquentBaseRepository implements CustomerGroupRepository
{
    /**
     * @var $model
     */
    protected $model;

	/**
	 * @param $model
	 */
    public function __construct(CustomerGroup $model)
    {
        $this->model = $model;
    }

	/**
	 * Get list items
	 * @return array
	 */
	public function listGroups() {
		return $this->model->lists('title', 'id');
	}
}