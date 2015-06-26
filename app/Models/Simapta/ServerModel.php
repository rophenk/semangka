<?php

namespace App\Models\Simapta;

use Illuminate\Database\Eloquent\Model;

class ServerModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'server';

    /**
	* Get the instansi that owns the server.
	*/
	public function instansi()
	{
		return $this->belongsTo('App\Models\Simapta\InstansiModel');
	}
}
