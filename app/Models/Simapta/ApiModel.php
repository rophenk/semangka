<?php

namespace App\Models\Simapta;

use Illuminate\Database\Eloquent\Model;

class ApiModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'api';

    /**
	* Get the server that owns the api.
	*/
	public function server()
	{
		return $this->belongsTo('App\Models\Simapta\ServerModel');
	}
}
