<?php namespace App\Components\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerOrganize extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ocs_customer_organizes';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'website', 'phone', 'fax', 'email', 'address', 'city', 'country',
	    'job', 'tax_code', 'contact_id','member_care_id'];

}