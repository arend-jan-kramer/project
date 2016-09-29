<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class pagesController extends Controller
{
    public function index()
    {
    	$menus = DB::table('links')->get();
    	return View('page.welcome', compact('menus'));
    }
    // public function reserveren()
    // {
    //     $tafel = 1;
    // 	$velden 		= ['naam', 'adres', 'woonplaats','email', 'telefoon'];
    // 	$orderlists 	= DB::table('tbl_orderlists')->get();
    //     return 'Tafel '.$tafel.' is vrij';
    //    	//return View('page.reserveren', compact('velden', 'orderlists'));
    // }

    // public function overzicht()
    // {
    // 	$reservations = DB::table('tbl_reservations')->get();
    // 	return View('page.overzicht', compact('reservations'));
    // }

//     public function bestel_menu()
//     {
//     	return view('page.bestel-menu');
//     }
}