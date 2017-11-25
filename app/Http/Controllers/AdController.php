<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use date;
use DB;
class AdController extends Controller
{

    public function goToCreateAd(Request $request)
    {
        return view('create_ad');
    }

    /*public function select($name, $list = [], $selected = null, $options = [])
    {!! Form::select('name', [null => 'Please Select'], null, ['required']) !!}*/


    public function CreateAd(Request $request)
    {

        $ad_name = $request->input('name');
        $category = $request->input('category');
        $store_type = $request->input('store_type');
        $product = $request->input('product');
        //$service = $request->input('service');
        $description = $request->input('description');
        $saleby = $request->input('saleby');
        $price = $request->input('price');
        $post_date = new DateTime('now');

        // DB::insert('insert into payments values(?)',[$name]);
        //'payment_id' => 2,
        $values = array(
            'user_id' => '3', 
            'ad_name'=> $ad_name,
            'category'=> $category,
            'product' => $product,
            'store_type' => $store_type,
            'description' => $description,
            'saleby' => $saleby,
            'price' => $price,
            'rank' => '0',    
            'post_date' => $post_date,
            'expire_date' => $post_date);
        DB::table('ads')->insert($values);
        
        return view('create_ad');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
