<?php namespace App\Components\OCS\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ocs_order_details';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['order_id', 'product_id', 'service_id', 'quantity', 'is_free', 'price',
	'created_by', 'note'];

	public function order() {
		return $this->belongsTo(Order::class, 'order_id', 'id');
	}
	public function product() {
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}
	public function service() {
		return $this->belongsTo(Service::class, 'service_id', 'id');
	}

}