<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Auth;

class PhysicalStoreController extends AuthController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add_store');
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
        $store = $request->input('Store_Name');
        $manager = $request->input('Store_Owner');
        $sl = $request->input('sl');

        $values = array('store_name'=>$store, 'store_manager'=>$manager,'sl'=>$sl);
        DB::table('physical_stores')->insertGetId($values); 

    }

    public function isWeekend($date) 
    {
        return (date('N', strtotime($date)) >= 6);
    }


    public function rent(Request $request)
    {
        $store_id = $request->input('item_id');
        $date = $request->input('date');
        $rent_hours = $request->input('renthour');

        if (Auth::check())
        {
            echo "hello";            
        }else
        {
            echo "no";
        }

        $weekend = $this->isWeekend($date);
        $id = Auth::user()->id;
        echo $id;
        $price = 0;
        $sl = DB::table('physical_stores')->select('sl')->where('store_id', $store_id)->first();
        $loc = (get_object_vars($sl));
        echo $loc['sl'];
        $v = array(1=>0.2,2=>0.15, 3=> 0.1, 4=> 0.5);

        if ($weekend)
        {
            $price = (25 + 15*$v[$loc['sl']])  * $rent_hours;
        }
        else
        {
            $price = (15+ 10*$v[$loc['sl']]) * $rent_hours;
        }

        $values = array('user_id'=> $id,'store_id'=> $store_id, 'rent_hours'=>$rent_hours, 'rent_date'=>$date, 'amount'=>$price);

        DB::table('stores_by_sellers')->insertGetId($values);
        return redirect()->intended('/profile/' . Auth::user()->username);
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
