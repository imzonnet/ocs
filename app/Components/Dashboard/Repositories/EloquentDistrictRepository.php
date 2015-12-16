<?php
namespace App\Components\Dashboard\Repositories;

use App\Components\Dashboard\Models\District;
use App\Repositories\EloquentBaseRepository;

class EloquentDistrictRepository extends EloquentBaseRepository implements DistrictRepository
{
    /**
     * @var $model
     */
    protected $model;

	/**
	 * @param $model
	 */
    public function __construct(District $model)
    {
        $this->model = $model;
    }

	/**
	 * Get list items
	 *
	 * @param null $town
	 *
	 * @return array
	 */
	public function listDistricts($town = null) {
		$query = $this->model;
		if( !empty($town))
			$query = $query->where('town_id', $town);
		return $query->get();
	}
}