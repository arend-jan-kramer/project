<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;

class bestelmenuController extends Controller
{
	public function index()
	{
		$bestel_menus = DB::table('tbl_orderlists')->get();
		return view('page.bestel-menu', compact('bestel_menus'));
	}
    public function aanpassen($id)
    {
    	$row = DB::table('tbl_orderlists')->where('id',$id)->first();
    	return view('page.update-bestelmenu')->with('row',$row);
    }

    public function update(Request $request)
    {        
        $post   = $request->all();
        $v      = \Validator::make($request->all(),
            [
                'naam'          => 'required',
                'description'   => 'required',
                'price'    		=> 'required',
                'visible'     => 'required',
            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        else
        {
            $data = array(
                'order_name'    => $post['naam'],
                'description'   => $post['description'],
                'price'         => $post['price'],
                'visible'       => $post['visible'],
                );
            $id = DB::table('tbl_orderlists')->where('id',$post['id'])->update($data);
            if($id > 0)
            {
                Session::flash('message', 'Menu aangepast');
                return redirect('bestel-menu');
            }
        }

        return redirect()->back();
    }
}
