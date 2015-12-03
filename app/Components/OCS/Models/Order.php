<?php namespace App\Components\OCS\Models;

use App\Components\Dashboard\Models\CustomerOrganize;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ocs_orders';

	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['order_code', 'customer_id', 'organize_id', 'order_address', 'created_date', 'process_date',
	'finish_date', 'created_by', 'manager_by'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function details() {
		return $this->hasMany(OrderDetail::class, 'order_id');
	}
	public function histories() {
		return $this->hasMany(OrderHistory::class, 'order_id')->orderBy('id', 'desc');
	}
	public function customer() {
		return $this->belongsTo(User::class, 'customer_id', 'id');
	}
	public function manager() {
		return $this->belongsTo(User::class, 'manager_by', 'id');
	}
	public function organize() {
		return $this->belongsTo(CustomerOrganize::class, 'organize_id', 'id');
	}

}