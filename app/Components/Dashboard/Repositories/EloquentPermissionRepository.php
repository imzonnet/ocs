<?php
namespace App\Components\Dashboard\Repositories;

use App\Permission;
use App\Repositories\EloquentBaseRepository;

class EloquentPermissionRepository extends EloquentBaseRepository implements PermissionRepository
{
    /**
     * @var Permission
     */
    protected $model;

    /**
     * @param Permission $model
     */
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }


    /**
     * Register list permissions
     *
     * @param array $data
     * @return mixed
     */
    public function register($data = array())
    {
        foreach($data as $perm) {
            $flag = $this->findBy('name', $perm['name']);
            if( !empty($flag) ) {
                $this->create($perm);
            }
        }
    }

    /**
     * Get list Permission filter by group
     * @return mixed
     */
    public function group()
    {
        $perms = $this->model->all(['name', 'id', 'display_name']);
        $group = [];
        foreach( $perms as $perm) {
            $p = explode('.', $perm->name);
            $group[$p[0]][$perm->id] = $perm->display_name;
        }
        return $group;
    }
}