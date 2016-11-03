<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_reservations extends Model
{
	protected $table = 'tbl_reservations';

	public $timestamps = false;

	public function customer()
	{
		return $this->belongsTo('App\Tbl_customers');
	}
}