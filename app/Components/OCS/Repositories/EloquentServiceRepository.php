<?php
namespace App\Components\OCS\Repositories;

use App\Components\OCS\Models\Service;
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

	/**
	 * @return mixed
	 */
	public function listServices() {
		return $this->model->lists('title', 'id');
	}
}