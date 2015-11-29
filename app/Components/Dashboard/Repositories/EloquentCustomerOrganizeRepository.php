<?php
namespace App\Components\Dashboard\Repositories;

use App\Components\Dashboard\Models\CustomerOrganize;
use App\Repositories\EloquentBaseRepository;

class EloquentCustomerOrganizeRepository extends EloquentBaseRepository implements CustomerOrganizeRepository
{
    /**
     * @var $model
     */
    protected $model;

	/**
	 * @param $model
	 */
    public function __construct(CustomerOrganize $model)
    {
        $this->model = $model;
    }

	/**
	 * Get list roles
	 * @return array
	 */
	public function listOrganizes()
	{
		return $this->model->lists('name', 'id');
	}

}