<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tbl_orders;
use App\tbl_table;

use Carbon\Carbon;
use DB;
use Response;

class PagesController extends Controller
{
    public function getReserveringen()
    {
        $todayNow = Carbon::now();
        $todayNow->subHours(2);
        $todayNow->toDateString();
        $todaySoon = Carbon::now();
        $todaySoon->toDateString();

        $reservations = tbl_orders::
        join('tbl_reservations','reservation_id','tbl_reservations.id')
        ->join('tbl_customers','customers_id','tbl_customers.id')
        ->whereBetween('table_date_time', array($todayNow, $todaySoon))
        ->where('payed','=','0')
        ->get();

        return Response::json($reservations);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = DB::table('links')->get();
        return View('page.welcome', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
