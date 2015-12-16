<?php namespace App\Components\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ocs_districts';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'town_id'];

	public function town() {
		return $this->belongsTo(Town::class, 'town_id', 'id');
	}

}