<?php
namespace App\Components\OCS\Repositories;

use App\Components\OCS\Models\Product;
use App\Repositories\EloquentBaseRepository;

class EloquentServiceRepository extends EloquentBaseRepository implements ServiceRepository
{
    /**
     * @var $model
     */
    protected $model;

	/**
	 * @param $model
	 */
    public function __construct(Service $model)
    {
        $this->model = $model;
    }

}