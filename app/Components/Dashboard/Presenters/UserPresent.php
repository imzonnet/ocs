<?php namespace App\Components\Dashboard\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresent extends Presenter{

    /**
     * Get Fullname Of User
     * @return string
     */
    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    /**
     * Get Fullname Of User
     * @return string
     */
    public function shortName()
    {
        return $this->first_name . ' ' . substr($this->last_name, 0, 1) . '.';
    }

    /**
     * Get Avatar
     * @return string
     */
    public function getAvatar()
    {
        if( !$this->avatar  ) {
            return asset(get_template_directory() .'/images/default.png');
        }
        return asset($this->avatar);
    }

    public function getRoles()
    {
        $roles = [];
        foreach( $this->roles as $role) {
            $roles[] = $role->display_name;
        }
        return $roles;
    }

    /**
     * @param string $field
     * @return array
     */
    public function selectedInterests($field = 'id')
    {
        $rs = [];
        foreach($this->interests as $interest) {
            $rs[] = $interest[$field];
        }
        return $rs;
    }

    /**
     * Get User Location
     * @return string
     */
    public function location()
    {
        return $this->city . ', ' . $this->state;
    }

    /**
     * Get number unread message
     */
    public function unread(){
        return $this->message->unread($this);
    }

    public function permalink(){
        return route('profile.index', [str_slug($this->fullName()), $this->id]);
    }

}
