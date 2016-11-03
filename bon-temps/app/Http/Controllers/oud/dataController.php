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
        
        $post   = $request->all();
        $v      = \Validator::make($request->all(),
            [
                'naam'          => 'required',
                'adres'         => 'required',
                'woonplaats'    => 'required',
                'email'         => 'required',
                'telefoon'      => 'required|max:10',
                'tijdstipu'     => 'required',
                'tijdstipm'     => 'required',
                'aantal'        => 'required',
                'menu'          => 'required',
            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        else
        {
            $data = array(
                'name'          => $post['naam'],
                'address'       => $post['adres'],
                'city'          => $post['woonplaats'],
                'email'         => $post['email'],
                'phone_number'  => $post['telefoon'],
                );
            $id = DB::table('tbl_customers')->insertGetId($data);
            $aankomst = Carbon::createFromFormat('d-m-Y H:i', $request['datum'].$request['tijdstipu'].':'.$request['tijdstipm']);
            DB::table('tbl_reservations')->insert([
                'customers_id'      => $id,
                'table_id'          => 1,
                'table_Date_time'   => $aankomst,
                'reservation_time'  => 2,
                'x_people'          => $post['aantal'],
                'reservation_menu'  => $post['menu'],
                ]);
            if($id > 0)
            {
                Session::flash('message', 'Toegevoegd aan de database');
                return redirect('reserveren');
            }
        }

    	return redirect()->back();
    }

    public function update(Request $request)
    {        
        $post   = $request->all();
        $v      = \Validator::make($request->all(),
            [
                'naam'          => 'required',
                'adres'         => 'required',
                'woonplaats'    => 'required',
                'email'         => 'required',
                'telefoon'      => 'required',
            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        else
        {
            $data = array(
                'name'          => $post['naam'],
                'address'       => $post['adres'],
                'city'          => $post['woonplaats'],
                'email'         => $post['email'],
                'phone_number'  => $post['telefoon'],
                );
            $id = DB::table('tbl_customers')->where('id',$post['id'])->update($data);
            if($id > 0)
            {
                Session::flash('message', 'Gebruiker updated');
                return redirect('overzicht');
            }
        }

        return redirect()->back();
    }

    public function aanpassen($id)
    {
        $row = DB::table('tbl_customers')->where('id',$id)->first();
        return view('page.update-reservatie')->with('row',$row);
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
