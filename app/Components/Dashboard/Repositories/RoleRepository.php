<?php namespace App\Components\Dashboard\Repositories;

use App\Repositories\BaseRepository;
use App\Role;

interface RoleRepository extends BaseRepository
{

    /**
     * Get list roles
     * @return array
     */
    public function listRoles();

    /**
     * Get list current permission of Role
     * @var Role $role
     * @return mixed
     */
    public function currentPerms(Role $role);
}