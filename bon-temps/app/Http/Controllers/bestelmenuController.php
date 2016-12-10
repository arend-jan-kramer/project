<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use Session;
use Image;

use App\tbl_orderlists;

class BestelMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // alle data in een variable opslaan
        $bestelmenus = tbl_orderlists::all();

        // return variable in de view
        return view('bestel-menu.index')->with(compact('bestelmenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bestel-menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dt = Carbon::now();
        // Validate the data
        $this->validate($request, array(
                'title'             => 'required',
                'description'       => 'required',
                'form_price'        => 'required'
            ));


        // Store in database
        $destinationPath = 'uploads';
        $image = $request->file('image');
        $imageUrl = $image->move($destinationPath,$image->getClientOriginalName());

        $img = Image::make($destinationPath.'/'.$image->getClientOriginalName());
        $img->resize(70, 70);
        $img->save($destinationPath.'/'.$image->getClientOriginalName());

        // var_dump($request);exit;
        $bestel_menu                = new tbl_orderlists;
        $bestel_menu->order_name    = $request->title;
        $bestel_menu->description   = $request->description;
        $bestel_menu->price         = $request->form_price;
        $bestel_menu->visible       = true;
        $bestel_menu->image_url     = $imageUrl;
        $bestel_menu->created_at    = $dt;
        $bestel_menu->updated_at    = $dt;
        $bestel_menu->save();

        // Redirect other page
        return redirect()->route('bestel-menu.show', $bestel_menu->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tbl_orderlists = tbl_orderlists::find($id);
        return view('bestel-menu.show')->with('bestelmenus', $tbl_orderlists);
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
        $tbl_orderlists = tbl_orderlists::find($id);
        return view('bestel-menu.edit')->with('bestelmenus', $tbl_orderlists);
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
        // validate te data
        $this->validate($request, array(
                'order_name'   => 'required',
                'description'  => 'required',
                'price'        => 'required'
            ));

        if($request->input('zichtbaar') == null){
            $visible = 0;
        }else{
            $visible = 1;
        }
        // Save the data to database
        $bestel_menu                = tbl_orderlists::find($id);
        $bestel_menu->order_name    = $request->input('order_name');
        $bestel_menu->description   = $request->input('description');
        $bestel_menu->price         = $request->input('price');
        $bestel_menu->visible       = $visible;

        $bestel_menu->save();

        // set fash data with succes message
        Session::flash('success', 'Opgeslagen in de database');

        // redirect with flash data to bestel-menu.show
        return redirect()->route('bestel-menu.show', $bestel_menu->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bestel_menus = tbl_orderlists::find($id);
        $bestel_menus = $bestel_menus->delete();

        return redirect()->route('bestel-menu.index');
    }
}
