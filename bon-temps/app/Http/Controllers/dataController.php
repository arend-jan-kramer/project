<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Validator;
use Carbon\Carbon;
use Session;

class dataController extends Controller
{
    public function save(Request $request)
    {
        $now = Carbon::now()->timezone('Europe/Amsterdam');  
        $aankomst = Carbon::createFromFormat('d-m-Y H:i', $request['datum'].$request['tijdstipu'].':'.$request['tijdstipm']);
        $post   = $request->all();
        $v      = \Validator::make($request->all(),
            [
                'naam'          => 'required',
                'adres'       => 'required',
                'woonplaats'          => 'required',
                'email'         => 'required',
                'telefoon'  => 'required',
            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        else
        {
            $data = array(
                'name'  => $post['naam'],
                'address' => $post['adres'],
                'city'  => $post['woonplaats'],
                'email' => $post['email'],
                'phone_number'  => $post['telefoon'],
                );
            $id = DB::table('tbl_customers')->insertGetId($data);
            DB::table('tbl_reservations')->insert([
                'customers_id'      => $id,
                'table_id'          => $post['tafel'],
                'table_Date_time'   => $aankomst,
                'reservation_time'  => 2,
                'x_people'          => $post['aantal'],
                'updated_at'        => $now,
                'created_at'        => $now,
                ]);
            if($id > 0)
            {
                Session::flash('message', 'Toegevoegd aan de database');
                return redirect('reserveren');
            }
        }
        //var_dump($post);exit;
    	// $now = Carbon::now()->timezone('Europe/Amsterdam');  
    	// $aankomst = Carbon::createFromFormat('d-m-Y H:i', $request['datum'].$request['tijdstipu'].':'.$request['tijdstipm']);

    	// $id = DB::table('tbl_customers')->insertGetId([
    	// 	'name' 			=> $request['naam'],
    	// 	'address' 		=> $request['adres'],
    	// 	'city' 			=> $request['woonplaats'],
    	// 	'email' 		=> $request['email'],
    	// 	'phone_number' 	=> $request['telefoon'],
    		
    	// 	]);
    	// DB::table('tbl_reservations')->insert([
    	// 	'customers_id'		=> $id,
    	// 	'table_id'			=> $request['tafel'],
    	// 	'table_Date_time'	=> $aankomst,
    	// 	'reservation_time'	=> 2,
    	// 	'x_people'			=> $request['aantal'],
    	// 	'updated_at'		=> $now,
    	// 	'created_at'		=> $now,
    	// 	]);

    	return redirect()->back();
    }

    public function aanpassen()
    {
        return view('page.update-reservatie');
    }

    public function delete($id)
    {
        $i = DB::table('tbl_customers')->where('id',$id)->delete();
        $e = DB::table('tbl_reservations')->where('id',$id)->delete();
        if($i > 0)
        {
            Session::flash('message', 'Gebruiker is verwijderd uit database');
            return redirect('overzicht');
        }
    }
}
