<?php namespace App\Components\OCS\Models;

use App\Components\Dashboard\Models\CustomerOrganize;
use App\User;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ocs_order_histories';

	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['order_id', 'changed_by', 'assigned_to', 'status_id'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function order() {
		return $this->hasMany(Order::class, 'order_id');
	}

	public function changed() {
		return $this->belongsTo(User::class, 'changed_by', 'id');
	}
	public function assigned() {
		return $this->belongsTo(User::class, 'assigned_to', 'id');
	}
	public function status() {
		return $this->belongsTo(CustomerOrganize::class, 'organize_id', 'id');
	}

}