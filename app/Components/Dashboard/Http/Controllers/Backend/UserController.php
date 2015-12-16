<?php namespace App\Components\Dashboard\Http\Controllers\Backend;

use App\Components\Dashboard\Http\Requests\UserRequest;
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

    public function __construct( UserRepository $user, RoleRepository $role, PermissionRepository $perms,
	    CustomerOrganizeRepository $organize, CustomerGroupRepository $group,
		CountryRepository $country, TownRepository $town, DistrictRepository $district)

    {
        parent::__construct();
        $this->user = $user;
        $this->role = $role;
        $this->permission = $perms;
	    $this->organize = $organize;
	    $this->group = $group;
	    $this->country = $country;
	    $this->town = $town;
	    $this->district = $district;
    }

    public function index()
    {
        $users = $this->user->all();
        $title = "List Users";
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.users.index', compact('title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Create New User";
        $roles = $this->role->listRoles();
        $groups = $this->group->listGroups();
	    $organizes = $this->organize->listOrganizes();
	    $countries = $this->country->listCountries();
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.users.create_edit', compact('title', 'roles', 'groups', 'organizes', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $attr = $request->all();
        $attr['password'] = bcrypt($attr['password']);
        $attr['birthday'] = Carbon::parse($attr['birthday'])->toDateString();
        $user = $this->user->create($attr);
        //attach role
        $user->attachRole($request->get('role'));

        return redirect(route('backend.user.index'))->with('success_message', 'The account has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $title = "Edit User";
        $user = $this->user->find($id);
        $roles = $this->role->listRoles();
	    $groups = $this->group->listGroups();
	    $organizes = $this->organize->listOrganizes();
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.users.create_edit', compact('user', 'title', 'roles', 'groups', 'organizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param UserRequest $request
     * @return Response
     */
    public function update($id, UserRequest $request)
    {
        $user = $this->user->find($id);

        $attr = $request->all();
        //update new password
        if( isset($attr['password']) ){
            $attr['password'] = bcrypt($attr['password']);
        }
        $attr['birthday'] = Carbon::parse($attr['birthday'])->toDateString();
        //attach role
        $user->detachRole($user->roles()->first());
        $user->attachRole($request->get('role'));
        $this->user->update($user, $attr);

        return redirect()->back()->with('success_message', 'The account has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);
        $user->delete();
        return redirect()->back()->with('success_message', 'The account has been deleted');
    }

}