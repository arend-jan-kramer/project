<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//extends Model or Eloquent
class tbl_orders extends Model
{
	protected $table = 'tbl_orders';
	//protected $fillable = array('Field_Name');
	public $timestamps = false;

	public function orderlists()
	{
		return $this->hasMany('App\Tbl_reservations');
	}
}