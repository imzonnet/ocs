<?php
namespace App\Components\Dashboard\Repositories;

use App\Components\Dashboard\Models\Country;
use App\Repositories\EloquentBaseRepository;

class EloquentCountryRepository extends EloquentBaseRepository implements CountryRepository
{
    /**
     * @var $model
     */
    protected $model;

	/**
	 * @param $model
	 */
    public function __construct(Country $model)
    {
        $this->model = $model;
    }

	/**
	 * Get list items
	 * @return array
	 */
	public function listCountries() {
		return $this->model->lists('name', 'id');
	}
}