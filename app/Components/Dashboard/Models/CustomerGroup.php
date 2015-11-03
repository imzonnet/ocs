<?php namespace App\Components\Dashboard\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CustomerGroup extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ocs_customer_groups';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];

}