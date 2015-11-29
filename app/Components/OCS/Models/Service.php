<?php namespace App\Components\OCS\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ocs_services';

	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'description'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function details() {
		return $this->hasMany(OrderDetail::class, 'service_id');
	}
}