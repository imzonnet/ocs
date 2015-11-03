<?php namespace App\Components\Dashboard\Http\Controllers\Backend;

use App\Components\Dashboard\Http\Requests\RoleRequest;
use App\Components\Dashboard\Repositories\PermissionRepository;
use App\Components\Dashboard\Repositories\RoleRepository;
use App\Http\Controllers\Controller;

class RoleController extends Controller {

    protected $role;
    protected $permission;

    public function __construct(RoleRepository $role, PermissionRepository $perms)
    {
        parent::__construct();
        $this->role = $role;
        $this->permission = $perms;
    }

    public function index()
    {
        $roles = $this->role->all();
        $title = "List Roles";
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.roles.index', compact('title', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Create New Role";
        $roles = $this->role->listRoles();
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.roles.create_edit', compact('title', 'roles'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param RoleRequest $request
	 *
	 * @return Response
	 */
    public function store(RoleRequest $request)
    {
        $role = $this->role->create($request->all());

        return redirect(route('backend.role.permission.index', $role->id))->with('success_message', 'The role has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $title = "Edit Role";
        $role = $this->role->find($id);

        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.roles.create_edit', compact('role', 'title'));
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @param RoleRequest $request
	 *
	 * @return Response
	 */
    public function update($id, RoleRequest $request)
    {
        $role = $this->role->find($id);
        $this->role->update($role, $request->all());
        return redirect()->back()->with('success_message', 'The role has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->role->find($id)->delete();
        return redirect()->back()->with('success_message', 'The role has been deleted');
    }

}