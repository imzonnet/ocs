<?php
namespace App\Components\Dashboard\Repositories;

use App\Repositories\EloquentBaseRepository;
use App\Role;

class EloquentRoleRepository extends EloquentBaseRepository implements RoleRepository
{
    /**
     * @var Role
     */
    protected $model;

    /**
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    /**
     * Find a Role
     *
     * @param $name
     * @return mixed
     */
    public function hasName($name)
    {
        $role = $this->findBy('name', $name);
        if(empty($role)) {
            return false;
        }
        return true;
    }

    /**
     * Get list roles
     * @return array
     */
    public function listRoles()
    {
        return $this->model->lists('name', 'id');
    }

    /**
     * Get list current permission of Role
     * @var Role $role
     * @return array
     */
    public function currentPerms(Role $role)
    {
        $perms = $role->perms()->lists('id');
        return $perms->toArray();
    }
}