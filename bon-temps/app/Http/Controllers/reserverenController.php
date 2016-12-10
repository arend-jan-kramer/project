<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tbl_reservations;
use App\tbl_customers;
use App\tbl_orderlists;
use App\tbl_orders;
use App\tbl_table;

use Carbon\Carbon;
use Session;
use Response;
use Input;

class ReserverenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $minutes = date('i', strtotime($timestring));
        // return $minutes - ($minutes % 15);

        $nowTime = Carbon::now()->second(0);
        switch($nowTime->minute){
            case($nowTime->minute < 15):
            $nowTime->minute = 15;
            break;
            case($nowTime->minute < 30):
            $nowTime->minute = 30;
            break;
            case($nowTime->minute < 45):
            $nowTime->minute = 45;
            break;
            default:
            $nowTime->minute = 0;
        }
        // $nowTime->minute = $nowTime->minute - ($nowTime->minute % 15);
        $orderlists = tbl_orderlists::where('visible', 1)->get();
        return view('reserveren.create')->with(compact('nowTime','orderlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return $this->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Maak datum check
        $voorAankomst = carbon::createFromFormat('Y-m-d H:i', date('Y-m-d H:i',strtotime($request->date)));
        $aankomstTijd = carbon::createFromFormat('Y-m-d H:i', date('Y-m-d H:i',strtotime($request->date)));
        $vertrekTijd = carbon::createFromFormat('Y-m-d H:i', date('Y-m-d H:i',strtotime($request->date)));
        $voorAankomst->subHours(2);

        // tafel nummers
        $tafles = tbl_table::all()->first();
        
        $check = tbl_reservations::whereBetween('table_date_time', array($aankomstTijd, $vertrekTijd))
        ->orderBy('table_id','desc')
        ->first();
        if($check == null){
            $x_tafels = $tafles->number - ceil($request->x_people / 4);
        }else{
            $x_tafels = $check->x_table - ceil($request->x_people / 4);
        }


        // check of gebruiker bestaat
        $nieuwGebruiker = tbl_customers::where('email','LIKE',$request->email)->first();
        
        if($nieuwGebruiker->email == $request->email){
            $updateGebruiker = tbl_customers::where('email','LIKE',$request->email)->first();

            // Een reservering aanmaken in de database
            $reservations                   = new tbl_reservations;
            $reservations->customers_id     = $updateGebruiker->id;
            $reservations->table_id         = $this->tafelNummer($voorAankomst, $vertrekTijd);
            $reservations->x_table          = $x_tafels;
            $reservations->table_date_time  = $aankomstTijd;
            $reservations->reservation_time = 2;
            $reservations->x_people         = $request->x_people;
            // $reservations->id               = 1;// moet weg

            // Reservering opslaan
            if($reservations->table_id  == null){
                Session::flash('warning', 'Tafels bezet kies een ander tijdstip');
                return redirect()->route('reserveren.index');
            }else{
                $reservations->save();
            }
            $reservations->save();

            $order                  = new tbl_orders;
            $order->reservation_id  = $reservations->id;
            $order->order_name      = $request->menu_name;
            $order->description     = $request->description;
            $order->x_drinks        = $request->x_people;
            $order->price           = $request->price;
            $order->payed           = 0;

            // Bestelling opslaan
            $order->save();
        }else{
            // // Controleren gegevens
            // $this->validate($request, array(
            //         'email'         => 'required|email|unique:tbl_customers,email',
            //         'phone_number'  => 'max:10',
            //         'x_people'      => 'required'
            //     ));

            // Nieuwe gebruiker toevoegen in de database
            $customers                = new tbl_customers;
            $customers->name          = $request->name;
            $customers->address       = $request->address;
            $customers->city          = $request->city;
            $customers->email         = $request->email;
            $customers->phone_number  = $request->phone_number;
            // $customers->id            = 1;// moet weg

            // Gebruiker opslaan
            $customers->save();

            // Een reservering aanmaken in de database
            $reservations                   = new tbl_reservations;
            $reservations->customers_id     = $customers->id;
            $reservations->table_id         = $this->tafelNummer($voorAankomst, $vertrekTijd);
            $reservations->x_table          = $x_tafels;
            $reservations->table_date_time  = $aankomstTijd;
            $reservations->reservation_time = 2;
            $reservations->x_people         = $request->x_people;
            // $reservations->id               = 1;// moet weg

            // Reservering opslaan
            if($reservations->table_id  == null){
                Session::flash('warning', 'Tafels bezet kies een ander tijdstip');
                return redirect()->route('reserveren.index');
            }else{
                $reservations->save();
            }
            $reservations->save();

            $order                  = new tbl_orders;
            $order->reservation_id  = $reservations->id;
            $order->order_name      = $request->menu_name;
            $order->description     = $request->description;
            $order->x_drinks        = $request->x_people;
            $order->price           = $request->price;
            $order->payed           = 0;

            // Bestelling opslaan
            $order->save();
        }

        // return Response::json(compact('customers','reservations','order'));

        Session::flash('success', 'Opgeslagen in de database');
        return redirect()->route('reserveren.index');
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

    public function check(){
        $menu_id = Input::get('key');
        $menulist = tbl_orderlists::where('id','=',$menu_id)->get();
        return Response::json($menulist);
    }

    /**
     *
     * Functie die gebruikt wordt om iets te testen
     *
     */
    public function tafelNummer($begin, $eind){ 
        // Controleren of reservering vrij is
        $aantal = tbl_reservations::whereBetween('table_date_time', array($begin, $eind))
        ->count();
        $nummer = tbl_reservations::
        orderBy('table_id','desc')
        ->whereBetween('table_date_time', array($begin, $eind))
        ->first();
        
        $tafles = tbl_table::all()->first();

        // var_dump($tafels);exit;
        // Geef een tafel nummer mee
        if($aantal >= $tafles->number){
            // Bezet
            return;
        }if($aantal == 0){
            // Vrij maar eerste tafel
            return 1;
        }else{
            // Vrij
            $nummer->table_id +=1;
            return $nummer->table_id;
        }
    }
}