<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class bestelmenuController extends Controller
{
	public function index()
	{
		$bestel_menus = DB::table('tbl_orderlists')->get();
		return view('page.bestel-menu', compact('bestel_menus'));
	}
    public function aanpassen()
    {
    	//
    }
}
