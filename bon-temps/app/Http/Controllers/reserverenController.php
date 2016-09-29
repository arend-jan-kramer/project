<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class reserverenController extends Controller
{
    public function index()
    {
    	$tafel 	= DB::table('tbl_tables')->where('visible','=','1')->first();
    	return $this->reserveren($tafel);
    }
    public function reserveren($tafel_nr)
    {
    	$velden 		= ['naam', 'adres', 'woonplaats','email', 'telefoon'];
    	$orderlists 	= DB::table('tbl_orderlists')->get();
       	return View('page.reserveren', compact('velden', 'orderlists','veldenr', 'tafel_nr'));
    }
}
