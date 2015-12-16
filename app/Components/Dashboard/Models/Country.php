<?php namespace App\Components\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ocs_countries';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

	public function towns() {
		return $this->hasMany(Town::class, 'country_id', 'id');
	}
}