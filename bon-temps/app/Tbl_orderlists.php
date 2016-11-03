<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_orderlists extends Model
{
	protected $table = 'tbl_orderlists';
	public $timestamps = false;

	public function orderlists()
	{
		return $this->belongsTo('App\Tbl_reservations');
	}
}