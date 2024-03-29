<?php
namespace App\Components\Dashboard\Repositories;

use App\Repositories\EloquentBaseRepository;
use App\User;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepository
{
    /**
     * @var User
     */
    protected $model;

    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Return all records/entities for users
     *
     * @param bool $status
     * @return array
     */
    public function listUsers($status = true)
    {
        $listUsers = array();
        if ($status) {
            $users = $this->model->where('activated', '=', 1)->get();
        } else {
            $users = $this->model->all();
        }
        foreach ($users as $usr) {
            $listUsers[$usr->id] = $usr->first_name . ' ' . $usr->last_name;
        }
        return $listUsers;
    }


}