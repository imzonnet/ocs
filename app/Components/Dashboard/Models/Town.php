<?php namespace App\Components\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ocs_towns';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'country_id'];

	public function country() {
		return $this->belongsTo(Country::class, 'country_id', 'id');
	}
	public function districts() {
		return $this->hasMany(District::class, 'town_id', 'id');
	}

}