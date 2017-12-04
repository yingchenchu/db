<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use date;
use DB;
class AdController extends Controller
{
    protected $table = "ads";
    public function CreateAd(Request $request)
    {
        //$user = DB::table('users')->where('user_name','=',$user_name)->get();
        $user_id        = '3';//$user->'user_id';
        $ad_name        = $request->input('name');
        $category       = $request->input('category');
        $store_type     = $request->input('store_type');
        $product        = $request->input('product');
        $description    = $request->input('description');
        $saleby         = $request->input('saleby');
        $price          = $request->input('price');
        $post_date      = new DateTime('now');
        $expire_date    = new DateTime('now'); //$user->'user_id'; //need to change based on the user's membership
        $email          = $request->input('email');
        $phonenumber    = $request->input('phonenumber');
        $address        = $request->input('address');


        $values = array(
            'user_id' => $user_id, 
            'ad_name'=> $ad_name,
            'category'=> $category,
            'product' => $product,
            'store_type' => $store_type,
            'description' => $description,
            'saleby' => $saleby,
            'price' => $price,
            'rank' => '0',
            'expire_rank' => $post_date,
            'post_date' => $post_date,
            'expire_date' => $expire_date,
            'email'         => $email,
            'phonenumber'   => $phonenumber,
            'address'       => $address);

        DB::table('ads')->insert($values);

        $ad = DB::table('ads')->orderBy('ad_id', 'desc')->first();
       return view('show_ad', ['ad' => $ad]);
    }
     public function showAllAds()
    {
        $ads = DB::table('ads')->orderBy('ad_id', 'desc')->orderBy('rank', 'desc')->get();
        if( !is_null($ads))
        {
            return view('showAds', compact('ads'));
        }
        else
        {
            return view('showAds');
        }
    }
    public function SearchedAds(Request $request)
    {
        $category   = $request->input('category');
        $product    = $request->input('product');
        $user_name  = $request->input('user_name');
        if($category == 'None' && $product == 'None' && $user_name === NULL)
        {
            $ads = DB::table('ads')->get();
            if( !is_null($ads))
            {
                return view('showAds', compact('ads'));
            }
            else
            {
                return view('showAds');
            }
        }
        else
        {
            $ads = DB::table('ads')->where('category','=',$category)->where('product','=',$product)->get();
            if( !is_null($ads))
            {   if($user_name === NULL) //only category and product
                {
                    return view('showAds', compact('ads'));
                }
                else //category, product and user name
                {
                    $user_id = DB::table('users')->where('user_name','=',$user_name)->get('user_id');
                    $ads_user = DB::table('ads')
                                ->where('category','=',$category)
                                ->where('product','=',$product)
                                ->where('user_id', '=', $user_id)->get();
                }
            }
            else
            {
                return view('showAds');
            }
        }   
    }

    public function showAdInfo($id)
    {
        $ad = DB::table('ads')->where('ad_id', $id)->first();
        return view('show_ad', ['ad' => $ad]); 
    }
    public function myads(){
    
        
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
