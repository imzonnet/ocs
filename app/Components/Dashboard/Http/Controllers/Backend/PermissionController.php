<?php namespace App\Components\Dashboard\Http\Controllers\Backend;

use App\Components\Dashboard\Repositories\PermissionRepository;
use App\Components\Dashboard\Repositories\RoleRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller {

    protected $role;
    protected $permission;

    public function __construct(RoleRepository $role, PermissionRepository $perms)
    {
        parent::__construct();
        $this->role = $role;
        $this->permission = $perms;
    }

    public function index($roleID)
    {
        $role = $this->role->find($roleID);
        $currentPerms = $this->role->currentPerms($role);
        $permissions = $this->permission->group();
        $title = "Update Permissions For Role";
        return view('Dashboard::' . $this->link_type . '.' . $this->current_theme . '.roles.permission', compact('title', 'role', 'permissions', 'currentPerms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $roleId
     * @param Request $request
     * @return Response
     */
    public function store($roleId, Request $request)
    {
        $attr = $request->all();
        $role = $this->role->find($roleId);
        //attach role
        $role->detachPermissions($role->perms()->get());
        $role->attachPermissions($request->get('perms', array()));
        
        return redirect()->back()->with('success_message', 'The permission has been updated');
    }

}