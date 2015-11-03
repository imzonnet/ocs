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

    /**
     * Create new record
     *
     * @param array $attributes
     * @return static
     */
    public function create(array $attributes = array())
    {
        $this->getLatLong($attributes['zipcode'], $attributes);
        return $this->model->create($attributes);
    }

    /**
     * Update a record
     *
     * @param User $user
     * @param array $attributes
     * @return mixed
     * @throws \Exception
     */
    public function update($user, array $attributes = array())
    {
        $this->getLatLong($attributes['zipcode'], $attributes);
        return $user->update($attributes);
    }

    /**
     * Get list ID current interests
     * @return array|null
     */
    public function currentInterests($user)
    {
        $interests = $user->interests()->get();
        $list = [];
        foreach( $interests as $interest ) {
            $list[$interest->id] = $interest->name;
        }
        return $list;
    }

    /**
     * Get Lat - Long via ZipCode
     *
     * @param $zipcode
     * @param $attributes
     * @return array
     */
    public function getLatLong($zipcode, &$attributes){
        $result = getLatLong($zipcode);
        //set value
        $attributes['lat'] = $result['lat'];
        $attributes['long'] = $result['lng'];
        return $attributes;
    }
}