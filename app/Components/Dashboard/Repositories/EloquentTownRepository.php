<?php
namespace App\Components\Dashboard\Repositories;

use App\Components\Dashboard\Models\Town;
use App\Repositories\EloquentBaseRepository;

class EloquentTownRepository extends EloquentBaseRepository implements TownRepository
{
    /**
     * @var $model
     */
    protected $model;

	/**
	 * @param $model
	 */
    public function __construct(Town $model)
    {
        $this->model = $model;
    }

	/**
	 * Get list items
	 *
	 * @param null $country
	 *
	 * @return array
	 */
	public function listTowns($country = null) {
		$query = $this->model;
		if( !empty($country))
			$query = $query->where('country_id', $country);
		return $query->get();
	}
}