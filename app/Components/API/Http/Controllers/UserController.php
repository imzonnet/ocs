<?php namespace App\Components\API\Http\Controllers;

use App\Components\Dashboard\Repositories\CountryRepository;
use App\Components\Dashboard\Repositories\CustomerGroupRepository;
use App\Components\Dashboard\Repositories\CustomerOrganizeRepository;
use App\Components\Dashboard\Repositories\DistrictRepository;
use App\Components\Dashboard\Repositories\PermissionRepository;
use App\Components\Dashboard\Repositories\RoleRepository;
use App\Components\Dashboard\Repositories\TownRepository;
use App\Components\Dashboard\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class UserController extends Controller {

	protected $user;
	protected $role;
	protected $permission;
	protected $organize;
	protected $group;
	protected $country, $town, $district;

	public function __construct(
		UserRepository $user, RoleRepository $role, PermissionRepository $perms,
		CustomerOrganizeRepository $organize, CustomerGroupRepository $group,
		CountryRepository $country, TownRepository $town, DistrictRepository $district
	) {
		parent::__construct();
		$this->user       = $user;
		$this->role       = $role;
		$this->permission = $perms;
		$this->organize   = $organize;
		$this->group      = $group;
		$this->country    = $country;
		$this->town       = $town;
		$this->district   = $district;
	}

	/**
	 * Get List Town Of A Country
	 * @param $country_id
	 *
	 * @return array
	 */
	public function getTowns( $country_id ) {
		$items = $this->town->listTowns($country_id);
		if(\Request::ajax()) {
			return view( 'API::address.towns', compact( 'items' ) );
		}
		return false;
	}
	/**
	 * Get List District Of A Town
	 * @param $town_id
	 *
	 * @return array
	 */
	public function getDistricts( $town_id ) {
		$items = $this->district->listDistricts($town_id);
		if(\Request::ajax()) {
			return view( 'API::address.towns', compact( 'items' ) );
		}
		return false;
	}

}