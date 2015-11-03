<?php namespace App\Components\Dashboard\Repositories;

use App\Repositories\BaseRepository;

interface PermissionRepository extends BaseRepository
{

    /**
     * Register list permissions
     *
     * @param array $data
     * @return mixed
     */
    public function register($data = array());

    /**
     * Get list Permission filter by group
     * @return mixed
     */
    public function group();

}