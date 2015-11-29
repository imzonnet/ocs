<?php

namespace App;

use App\Components\Dashboard\Presenters\UserPresent;
use App\Components\OCS\Models\Order;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Laracasts\Presenter\PresentableTrait;
use Zizaco\Entrust\Traits\EntrustUserTrait;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, EntrustUserTrait, PresentableTrait;

    protected $presenter = UserPresent::class;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'activation_code', 'activated',
	    'job', 'phone', 'mobile', 'know_us', 'intro_person', 'group_id', 'organize_id',
        'city', 'address', 'country', 'gender', 'birthday'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

	public function orders() {
		return $this->hasMany(Order::class, 'customer_id');
	}

}
