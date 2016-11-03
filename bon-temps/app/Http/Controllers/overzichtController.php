<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;
use Input;
use Carbon\Carbon;
use App\Http\Requests;

use App\tbl_reservations;
use App\tbl_orders;
use App\tbl_customers;

class OverzichtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('overzicht.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Deze is excepted...
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // afrekenen
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Download de PDF file
        $table = tbl_orders::
        join('tbl_reservations','reservation_id','tbl_reservations.id')
        ->join('tbl_customers','customers_id','tbl_customers.id')
        ->select('tbl_orders.*','tbl_customers.*','tbl_reservations.*')
        ->find($id);

        $filename = "bon.pdf";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('id', 'naam', 'adres', 'plaats', 'email', 'telefoon nummer'));

        foreach($table as $row) {
            fputcsv($handle, array($row['id'], $row['name'], $row['address'], $row['city'], $row['email'], $row['phone_number']));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response()->download($filename, 'bon.pdf', $headers);

        // return Response::json($reservations);
        // return view('overzicht.show')->with(compact('reservations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservations = tbl_orders::
        join('tbl_reservations','reservation_id','tbl_reservations.id')
        ->join('tbl_customers','customers_id','tbl_customers.id')
        ->select('tbl_orders.*','tbl_customers.*','tbl_reservations.*')
        ->find($id);
        // $reservations = tbl_reservations::find($id);
        return view('overzicht.edit')->with(compact('reservations'));
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
        $reservations = tbl_orders::find($id);

        $reservations->x_drinks = $request->x_drinks;
        $reservations->save();
        return redirect()->route('overzicht.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservations = tbl_reservations::find($id);
        $reservations->delete();

        return redirect()->route('overzicht.index');
    }

    /**
     *
     * Search for reservations
     *
     */
    public function search(){
        $value = Input::get('keyword');
        $today = Carbon::today()->toDateString();
        $reservations = tbl_orders::
        join('tbl_reservations','reservation_id','tbl_reservations.id')
        ->join('tbl_customers','customers_id','tbl_customers.id')
        ->select('tbl_orders.*','tbl_customers.*','tbl_reservations.*')
        ->where([
            ['name','LIKE','%'.$value.'%'],
            ['table_date_time','>',$today]
        ])
        ->get();
        return Response::json($reservations);
    }

    /**
     *
     * Functie die gebruikt wordt om iets te testen
     *
     */
    public function test($datum, $time, $x_people){ 
        // om 10:00 uur reserveren dan is tafel om 12:00 vrij
        // als je om 10:30 reserver is dit niet mogelijk
        $begin = Carbon::createFromFormat('Y-m-d H:i', $datum.' '.$time);
        // subMinut omdat je checkt of er al eerder gereserveerd is
        $begin->subMinute(119);
        $eind = Carbon::createFromFormat('Y-m-d H:i', $datum.' '.$time);
        // $eind->addMinute(59);
        $test = tbl_reservations::whereBetween('table_date_time', array($begin, $eind))
        // ->where('table_id',$id)
        ->count();
        // ->get();

        // tafel nummers
        $x_tafels = ceil($x_people / 4);

        // Geeft aan of een tafel vrij is
        if($test >= 10){
            $beschikbaar = 'Deze tafel is bezet, kies een andere datum of tijdstip. Tafels bezet: '.$test;
        }else{
            $taflesVrij = 20 - $test;
            $beschikbaar = 'Deze tafel is vrij. Aantal tafels bezet: '.$test.' Tafels vrij: '.$taflesVrij;
        }
        return $beschikbaar.'<br>'.$x_tafels;
    }

    public function download(){
        $table = tbl_customers::all();
        $filename = "klanten.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('id', 'naam', 'adres', 'plaats', 'email', 'telefoon nummer'));

        foreach($table as $row) {
            fputcsv($handle, array($row['id'], $row['name'], $row['address'], $row['city'], $row['email'], $row['phone_number']));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename, 'klanten.csv', $headers);
    }
}