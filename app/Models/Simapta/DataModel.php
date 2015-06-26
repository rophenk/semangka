<?php

namespace App\Models\Simapta;

use Illuminate\Database\Eloquent\Model;

class DataModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'data';

    /**
	* Get the server that owns the api.
	*/
	public function api()
	{
		return $this->belongsTo('App\Models\Simapta\ApiModel');
	}
}
