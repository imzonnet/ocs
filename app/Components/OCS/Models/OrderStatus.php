<?php namespace App\Components\OCS\Models;

use App\Components\Dashboard\Models\CustomerOrganize;
use App\User;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ocs_order_status';

	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['status_code', 'title', 'description'];

}