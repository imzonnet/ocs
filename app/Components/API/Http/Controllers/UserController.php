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
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller {

	protected $user;
	protected $role;
	protected $permission;
	protected $organize;
	protected $group;
	protected $country, $town, $district;

	public function __construct(
		User $user, RoleRepository $role, PermissionRepository $perms,
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

	/**
	 * @param Request $request
	 *
	 * @return string
	 */
	public function postInfo(Request $request) {
		$rs = $this->user->findBy($request->get('field'), $request->get('value'));
		return !empty($rs) ? 'false' : 'true';
	}

	/**
	 * Search a customer
	 *
	 * @param Request $request
	 *
	 * @return array|\Illuminate\View\View|mixed
	 */
	public function getSearch(Request $request) {
		$user = \DB::table('users');
		$user->select('*', \DB::raw('CONCAT(first_name, " ", last_name) AS full_name'));
		if( $request->has('name') ) {
			$user->whereRaw( \DB::raw('CONCAT(first_name, " ", last_name)') . ' LIKE ?', ["%".$request->get('name')."%"]);
		}
		if( $request->has('last_name') ) {
			$user->where('last_name', 'LIKE', '%'.$request->get('last_name').'%');
		}
		if( $request->has('email') ) {
			$user->where('email', '=', $request->get('email'));
		}
		if( $request->has('phone') ) {
			$user->where('phone', '=', $request->get('phone'));
		}
		$users = $user->paginate(20);
		if(\Request::ajax()) {
			return view( 'API::users.search', compact( 'users' ) );
		}
		return redirect()->back()->withErrors('Sever busy! Please try again');
	}

}