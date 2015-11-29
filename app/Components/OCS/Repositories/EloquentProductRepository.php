<?php
namespace App\Components\OCS\Repositories;

use App\Components\OCS\Models\Product;
use App\Repositories\EloquentBaseRepository;

class EloquentProductRepository extends EloquentBaseRepository implements ProductRepository
{
    /**
     * @var $model
     */
    protected $model;

	/**
	 * @param $model
	 */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

	public function listProducts() {
		return $this->model->lists('title', 'id');
	}
}