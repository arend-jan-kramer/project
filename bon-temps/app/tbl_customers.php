<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_customers extends Model
{
	protected $table = 'tbl_customers';
	public $timestamps = false;

	public function reservation()
	{
		return $this->belongsTo('App\Tbl_reservations');
	}
}