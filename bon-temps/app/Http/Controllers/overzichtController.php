<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests;
use DB;

class overzichtController extends Controller
{
    
    public function index()
    {
    	$reservations = DB::table('tbl_reservations')
    		->leftJoin('tbl_customers','tbl_reservations.customers_id','=','tbl_customers.id')
    		->paginate(10);
    	return View('page.overzicht', compact('reservations'));
    }

    public function zoeken(Request $request)
    {
    	$naam = $request->all();
    	$reservations = DB::table('tbl_reservations')
    	->where('name',$naam)
    		->leftJoin('tbl_customers','tbl_customers.id','=','tbl_reservations.customers_id')
    		->get();
    	return View('page.zoeken',  compact('reservations'));
    }
}
// ->leftJoin('tbl_reservations','tbl_reservations.id','=','customers_id')



// $naam = $request->all();
// $reservations = DB::table('tbl_customers')
// 	->where('name','=',$naam)
// 	->first();
// return $reservations->id;